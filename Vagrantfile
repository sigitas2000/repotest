VAGRANTFILE_API_VERSION = "2"
Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "lap"
  config.vm.box_url = "http://pkg.callcenter.lamoda.ru/boxes/debian-7.4.0.box"

  config.vm.network "private_network", ip: "192.168.33.50"
  config.vm.hostname = "host"
  
  config.vm.synced_folder ".", "/vagrant_data"
  
  config.vm.provider "virtualbox" do |v|
    v.name = config.vm.box
    v.memory = 512
    v.cpus = 2
  end
  
  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "lap.yml"
    ansible.inventory_path = "hosts"
    ansible.tags = "lap-pkg-update"
  end
end
