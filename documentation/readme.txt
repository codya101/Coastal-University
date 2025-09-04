1) Created an EC2 instance
2) Downloaded .pem file to Windows 
3) copied .pem file to WSL 
4) Created a Coastal directory in WSl and a keys subdirectory 
5) ran this command to SSH 
ssh -i keys/coastal-key.pem ec2-user@ec2-3-93-215-67.compute-1.amazonaws.com
6) i got an error on permissions for Coastal key file, so I ran commands to fix that
 chmod 700 keys
 chmod 600 keys/coastal-key.pem
7) SHH into my ec2 instance
8) installed mysql command utility
sudo yum install mysql 
9) installed php
sudo yum install php
10) tried to connect to database, but it timed out. Need incoming connections allowed
11) went into the ec2 instance and alllowed it to talk to my db through the 3306 port
12) followed this tutorial 
https://docs.aws.amazon.com/AWSEC2/latest/UserGuide/ec2-lamp-amazon-linux-2.html 