# -*- mode: ruby -*-
# vi: set ft=ruby :
class Hash
  def slice(*keep_keys)
    h = {}
    keep_keys.each { |key| h[key] = fetch(key) if has_key?(key) }
    h
  end unless Hash.method_defined?(:slice)
  def except(*less_keys)
    slice(*keys - less_keys)
  end unless Hash.method_defined?(:except)
end
# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  # Online Vagrantfile documentation is at https://docs.vagrantup.com.

  # The AWS provider does not actually need to use a Vagrant box file.
  config.vm.box = "dummy"

  config.vm.provider :aws do |aws, override|
    # We will gather the data for these three aws configuration
    # parameters from environment variables (more secure than
    # committing security credentials to your Vagrantfile).
    #
    aws.access_key_id = ""
    aws.secret_access_key = ""
    aws.session_token = ""
	
	# The region for Amazon Educate is fixed.
    aws.region = "us-east-1"

    # These options force synchronisation of files to the VM's
    # /vagrant directory using rsync, rather than using trying to use
    # SMB (which will not be available by default).
    override.nfs.functional = false
    override.vm.allowed_synced_folder_types = :rsync

    # Following the lab instructions should lead you to provide values
    # appropriate for your environment for the configuration variable
    # assignments preceded by double-hashes in the remainder of this
    # :aws configuration section.

    # The keypair_name parameter tells Amazon which public key to use.
    aws.keypair_name = "a2-2022"
    # The private_key_path is a file location in your macOS account
    # (e.g., ~/.ssh/something).
    # For Windows users, just point to the path where you have downloaded the keypair
    # (e.g., C:\\Users\\<username>\\foo.pem). (Use double "\\" for folder path)
    override.ssh.private_key_path = "C:\\Users\\User\\.ssh\\a2-2022.pem"

    # Choose your Amazon EC2 instance type (t2.micro is cheap).
    aws.instance_type = "t2.micro"

    # You need to indicate the list of security groups your VM should
    # be in. Each security group will be of the form "sg-...", and
    # they should be comma-separated (if you use more than one) within
    # square brackets.
    #
    aws.security_groups = ["sg-01a820d61612a537f","sg-031bb590a4ffed0b1", "sg-0fe92743655561019"]

    # For Vagrant to deploy to EC2 for Amazon Educate accounts, it
    # seems that a specific availability_zone needs to be selected
    # (will be of the form "us-east-1a"). The subnet_id for that
    # availability_zone needs to be included, too (will be of the form
    # "subnet-...").
    aws.availability_zone = "us-east-1a"
    aws.subnet_id = "subnet-051132ba081299679"

    # You need to chose the AMI (i.e., hard disk image) to use. This
    # will be of the form "ami-...".
    # 
    # If you want to use Ubuntu Linux, you can discover the official
    # Ubuntu AMIs: https://cloud-images.ubuntu.com/locator/ec2/
    #
    # You need to get the region correct, and the correct form of
    # configuration (probably amd64, hvm:ebs-ssd, hvm).
    #
    aws.ami = "ami-0c1704bac156af62c"

    # If using Ubuntu, you probably also need to uncomment the line
    # below, so that Vagrant connects using username "ubuntu".
    override.ssh.username = "ubuntu"
  end
  
   #VM1 for webserver
  config.vm.define "webserver" do | webserver |
	webserver.vm.hostname = "webserver"
	webserver.vm.provision "shell", inline: <<-SHELL
	apt-get update
	apt-get install -y apache2 php libapache2-mod-php php-mysql
	cp /vagrant/webserver-site.conf /etc/apache2/sites-available/
	chmod 777 /vagrant
	chmod 777 /vagrant/www
	chmod 777 /vagrant/www/index.php
	chmod 777 /vagrant/www/insert.php
	a2ensite webserver-site
	a2dissite 000-default
	service apache2 reload
  SHELL
 end
 
 #VM2 for adminserver
  config.vm.define "adminserver" do | adminserver |
	adminserver.vm.hostname = "adminserver"
	adminserver.vm.provision "shell", inline: <<-SHELL
	apt-get update
	apt-get install -y apache2 php libapache2-mod-php php-mysql
	cp /vagrant/admin-site.conf /etc/apache2/sites-available/
	chmod 777 /vagrant
	chmod 777 /vagrant/admin
	chmod 777 /vagrant/admin/index.php
	a2ensite admin-site
	a2dissite 000-default
	service apache2 reload
  SHELL
 end

  # Enable provisioning with a shell script. Additional provisioners such as
  # Puppet, Chef, Ansible, Salt, and Docker are also available. Please see the
  # documentation for more information about their specific syntax and use.
  # config.vm.provision "shell", inline: <<-SHELL
  #   apt-get update
  #   apt-get install -y apache2
  # SHELL
end
