CREATE TABLE `unifruit`.`client` (`id` INT NOT NULL AUTO_INCREMENT , `user` VARCHAR(128) NOT NULL , `password` VARCHAR(256) NOT NULL , `name` VARCHAR(64) NOT NULL , PRIMARY KEY (`id`), UNIQUE `userIndex` (`user`(128))) ENGINE = InnoDB;

select * from client;

CREATE TABLE transactions(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	id_fruit INT NOT NULL,
    id_client INT NOT NULL,
    quantityFruits INT NOT NULL,
    FOREIGN KEY (id_fruit) REFERENCES fruits(id),
    FOREIGN KEY (id_client) REFERENCES client(id)
);

drop table transactions;

select * from transactions;

INSERT fruits (name,value) VALUES('Teste 002','5.0');

select * from fruits;