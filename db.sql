CREATE DATABASE bankly;
use bankly;

    create table customers (
     customer_id int primary key auto_increment,
     full_name varchar (50),
     email varchar (100),
     phone int,
     registration_date date default current_timestamp
     );

    create table advisors (
     advisor_id int primary key auto_increment,
     full_name varchar (50),
     email varchar(100)
     );

    create table accounts (
     account_id int primary key auto_increment,
     account_number int,
     balance int,
     account_type enum ("checking", "savings", "business"),
     customer_id int,
     foreign key (customer_id) references customers (customer_id)
     );

    create table transactions (
     transaction_id int primary key auto_increment,
     amount int,
     transaction_type enum ('debit', 'credit'),
     transaction_date datetime default current_timestamp,
     account_id int,
     foreign key (account_id) references accounts (account_id) ON DELETE CASCADE
     );


insert into customers (full_name, email, phone)
     values ("chahd_mazouz", "mazouzchahd12@gmail.com", 0707231103),
              ("khalid_boutuil", "khalid.boutuil@gmail.com", 0654789213),
              ("redouane_ibnbrahim", "red_bnbrahim@gmail.com", 0542136975),
              ("bilal_zarrik", "bilal.zar@gmail.com", 0706563921),
              ("dar_hamza", "dar.hamza@gmail.com", 0523114098);



insert into advisor (full_name, email)
     values ("ahmed", "ahmed@gmail.com"),
              ("sarra", "sarra@gmail.com"),
              ("meryem", "meryem@gmail.com"),
              ("amine", "amine@gmail.com"),
              ("mohammed", "mohammed@gmail.com");

INSERT into transactions (amount)
    values (500), (100), (800), (1000), (300);

insert into transactions (transaction_type)
     value ("credit"),  ("credit"),  ("credit");

insert into transactions (transaction_type)
     value ("debit"),  ("debit");

   update transactions
     set account_id = 1
     where transaction_id = 1;
    
update  transactions
     set account_id = 2
     where transaction_id = 2;
update  transactions
     set account_id = 3
     where transaction_id = 3;
update  transactions
     set account_id = 4
     where transaction_id = 4;
update  transactions
     set account_id = 5
     where transaction_id = 5;



  insert into accounts (account_number, balance, account_type)
     values (1002, 50000,"business" , 5);
     values (1003, 40000,"business"),
     values (1004, 20000,"business"),
     values (1005, 80000,"business"),
     values (1006, 100000,"business");

update  accounts
     set customer_id = 1
     where account_id = 1;
update  accounts
     set customer_id = 2
     where account_id = 2;
update  accounts
     set customer_id = 3
     where account_id = 3;
update  accounts
     set customer_id = 4
     where account_id = 4;
update  accounts
     set customer_id = 5
     where account_id = 5;


update  accounts
     set advisor = 1
     where account_id = 1;
update  accounts
     set advisor = 2
     where account_id = 2;
update  accounts
     set advisor = 3
     where account_id = 3;
update  accounts
     set advisor = 4
     where account_id = 4;<
update  accounts
     set advisor = 5
     where account_id = 5;



