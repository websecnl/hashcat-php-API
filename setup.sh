apt -y update
apt -y install sudo
apt -y install git
apt -y install dnsutils
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
sudo iptables -A INPUT -p tcp --dport 80 -m conntrack --ctstate NEW,ESTABLISHED -j ACCEPT
sudo iptables -A OUTPUT -p tcp --sport 80 -m conntrack --ctstate ESTABLISHED -j ACCEPT
sudo iptables -A INPUT -p tcp --dport 443 -m conntrack --ctstate NEW,ESTABLISHED -j ACCEPT
sudo iptables -A OUTPUT -p tcp --sport 443 -m conntrack --ctstate ESTABLISHED -j ACCEPT
apt -y install curl
apt -y install php libapache2-mod-php php-mcrypt php-mysql
apt -y install systemctl
systemctl restart apache2
service apache2 restart
cd /var/www/html
wget https://gratispentest.nl/wordlist/hashcat.txt
mv hashcat.txt hashcat.php
myip="$(dig +short myip.opendns.com @resolver1.opendns.com)"
echo "My Hashcat API address is: http://${myip}/hashcat.php"
