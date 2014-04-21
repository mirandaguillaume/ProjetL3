# =============================================================================
# REQUIRED VARIABLES
# =============================================================================
set :application, "MaBeaute.com"
set :domain,      "localhost"
set :deploy_to,   "/home/guillaume/PhpstormProjects/ProjetL3Test/"
set :app_path,    "app"

# =============================================================================
# SCM OPTIONS
# =============================================================================
set :repository,  "https://github.com/kirito11/ProjetL3.git"
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, or `none`
set :deploy_via,  :remote_cache
ssh_options[:forward_agent] = true
default_run_options[:pty] = true


set :user, "guillaume"
set :model_manager, "doctrine"
# Or: `propel`

role :web,        domain                         # Your HTTP server, Apache/etc
role :app,        domain, :primary => true       # This may be the same as your `Web` server

set  :shared_files,  ["app/config/parameters.yml"]
set  :shared_children,  [app_path+"/logs",web_path+"/uploads","vendor"]
set  :keep_releases,  3

set :use_sudo, false
set :use_composer,  true
set :update_vendors, true
set :vendor_mode, :reinstall

set :writable_dirs,       ["app/cache", "app/logs"]
set :webserver_user,      "www-data"
set :permission_method,   :acl
set :use_set_permissions, true

# Be more verbose by uncommenting the following line
logger.level = Logger::MAX_LEVEL