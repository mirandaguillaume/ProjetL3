<?php
/**
 * Created by PhpStorm.
 * User: guillaume
 * Date: 23/03/14
 * Time: 17:32
 */

namespace ProjetL3\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class SendMailCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('send:mail')
            ->setDescription('Envoyer le mail de newsletter')
            ->addArgument('intervalle',InputArgument::OPTIONAL,'Quel type de newsletter à envoyer ?','jour')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();
        $intervalle = $input->getArgument('intervalle');
        $duree = "P1D";
        if ($intervalle == 'semaine') {
            $duree = "P7D";
        }
        $liens=$em->getRepository('ProjetL3LienBundle:Lien')->findLastPosts($duree);
        $users=$em->getRepository('ProjetL3UserBundle:User')->findByFreq_actu($intervalle);

        $date = new \DateTime();

        $message = \Swift_Message::newInstance()
            ->setSubject('Newsletter du '.$date->format('d-m-Y'))
            ->setFrom('newsletter@projetl3.com')
        ;

        foreach($users as $user){
            $message
                ->setTo($user->getEmail())
                ->setBody($this->getContainer()->get('templating')->render('@ProjetL3Main/newsletter.html.twig',array(
                    'liens' => $liens,
                    'user' => $user,
                )),'text/html')
            ;
            $this->getContainer()->get('mailer')->send($message);
        }

    }
}