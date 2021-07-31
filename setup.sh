apt -y update
apt -y install git
git clone https://github.com/hashcat/hashcat.git
cd hashcat
make
echo "export PATH=\$PATH:$(pwd)" >> ~/.bashrc
apt install -y nvidia-opencl-dev
apt -y install wget
cd rules
wget https://raw.githubusercontent.com/NotSoSecure/password_cracking_rules/master/OneRuleToRuleThemAll.rule
cd ..
mkdir wordlist
cd wordlist
wget https://gratispentest.nl/wordlist/ASLM(freq_sorted).txt
cd ..
apt -y install apache2
apt -y install ufw
ufw allow 80
ufw allow 443
ufw allow http
ufw allow https
ufw allow in "Apache Full"
apt -y install curl
apt -y install php libapache2-mod-php php-mcrypt php-mysql
apt -y install systemctl
systemctl restart apache2
cd /var/www/html
wget https://gratispentest.nl/wordlist/hashcat.txt
mv hashcat.txt hashcat.php
