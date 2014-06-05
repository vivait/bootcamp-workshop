Bootcamp Workshop
=================

Cool, so you're coming along to our Saturday Workshop (7th June). For you to have the best experience we have a 'recommended'
platform, well actually more of a 'highly recommended' platform.

TOOLS REQUIRED
==============

* JetBrains PHPStorm
The EAP (Early Access Program) is recommended as it has a lot of useful tools, although if you already have the normal release
version or an older version you may still be ok. If you are considering developing PHP then this is the gold standard of IDE
in our opinion. Symfony also hooks into this with plug-ins and makes it a very, very useful tool.

    * PHPStorm is commercial software, there is a trial available, it is also very reasonably priced.
    http://www.jetbrains.com/phpstorm/download/

    * EAP (Recommended)
    http://confluence.jetbrains.com/display/PhpStorm/PhpStorm+Early+Access+Program


* Vagrant
Vagrant is the tool we will be using to virtualise a server (Apache, PHP and MySQL), we have done all the hardwork for you 
configuring the server so you can just start developing. Vagrant is only about managing the virtual machine, you will also 
need a hypervisor (VirtualBox)
https://www.vagrantup.com/downloads.html


* Oracle VirtualBox
VirtualBox is a virtualiser for x86 hardware, it's not particually fast but it is free (works in conjuntion with Vagrant)
https://www.virtualbox.org/wiki/Downloads



OUR WORKSHOP MATERIAL
=====================
Once you have all the tools above installed you will need to download the base box configurator (we are using Puphpet), 
this contains the script to set up and configure vagrant and (fingers crossed) should do everything. You can download this here
http://www.vivait.co.uk/Bootcamp-1.zip



INSTALLATION (Important)
========================
__Ultra Important Note: You must do this before you arrive, the basebox will download an entire virtual machine and is very large
we will have some serious WiFi issues if everyone does this on the day. Please, please perform the following steps before the day__

1. Download and install the tools mentioned in the 'tools required' section above
2. Download the workshop material zip file to a directory onto your computer and extract, i.e. onto your desktop so you have a 
folder called "Symfony Workshop" with a vagrantfile (and some other stuff in it)
3. Open a terminal (CMD in Windows or Terminal on OSX) and navigate to this directory
4. Type "vagrant up" and hit enter. This will start the download and build script, this can take approx 30 minutes to an hour to complete
5. You should see a lot of green text and ultimately our logo at the end of it with a link
6. Test your Symfony installation by visiting: http://127.0.0.1:8080/test/install (you should get a congrats welcome page)

To 'turn off' the virtual machine you type "vagrant halt", when you run "vagrant up" again at the workshop it should only take a few minutes

We have configured the virtual machine to only use 512MB RAM so should be suitable for low-spec machines.

CONFIGURE PHPSTORM
==================
Great so you now have your virtualised box up and running, now you need to create a new project in PHPStorm, you can do this very easily
by selecting "Create Project from Source Files" and point PHPStorm to the source files that are located in the 'www' subdirectory of the 
workshop material you downloaded and extracted.

To speed things along you should also install the 'Symfony2 Plugin' in PHPStorm, you can do this by going into the preferences of PHPStorm,
clicking on plug-ins in the left hand menu click on 'Browse Repositories' and search for Symfony2. (Highly Recommended)
 
We also recommend you install the "PHP Annotation" plugin.
 
Hopefully PHPStorm should automatically detect that you are using a Symfony framework and ask you to confirm this.
 
I NEED HELP
===========
We have a open chatroom, hopefully you can help each other (go on), but we will be there as much as we can.
https://www.hipchat.com/goBC0EASM

See you Saturday, doors open at 9AM, Presentation starts at 10AM we would really hope that everyone is 'vagrant up' and
PHPStorm open and ready by 10AM