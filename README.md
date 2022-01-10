# hls
Database:
CREATE DATABASE ajoke;

USE ajoke;

ALTER DATABASE ajoke
DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;

create table joke (
	 id int(11) NOT NULL AUTO_INCREMENT,
     content varchar(10000) NOT NULL, 
     liked int NOT NULL, 
     disliked int NOT NULL, 
     PRIMARY KEY (id)
     ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
     
 insert into joke values 
 (1,'A child asked his father, "How were people born?" So his father said, "Adam and Eve made babies, then their babies became adults and made babies, and so on."

The child then went to his mother, asked her the same question and she told him, "We were monkeys then we evolved to become like we are now."

The child ran back to his father and said, "You lied to me!" His father replied, "No, your mom was talking about her side of the family."', 0, 0), 
(2,'Teacher: "Kids,what does the chicken give you?" Student: "Meat!" Teacher: "Very good! Now what does the pig give you?" Student: "Bacon!" Teacher: "Great! And what does the fat cow give you?" Student: "Homework!"', 0, 0), 
(3,'The teacher asked Jimmy, "Why is your cat at school today Jimmy?" Jimmy replied crying, "Because I heard my daddy tell my mommy, "I am going to eat that pussy once Jimmy leaves for school today!"', 0, 0), 
(4,'A housewife, an accountant and a lawyer were asked "How much is 2+2?" The housewife replies: "Four!". The accountant says: "I think its either 3 or 4. Let me run those figures through my spreadsheet one more time." The lawyer pulls the drapes, dims the lights and asks in a hushed voice, "How much do you want it to be?"', 0, 0)
