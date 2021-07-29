
CREATE TABLE user(
    firstName VARCHAR(20) NOT NULL,
    lastName VARCHAR(20),
    email VARCHAR(50)  NOT NULL,
    tanggalLahir DATE NOT NULL,
    jenisKelamin VARCHAR(10) NOT NULL,
    pass VARCHAR(100) NOT NULL,
    profilePicture VARCHAR(200) NOT NULL,
    coverPicture VARCHAR(200) NOT NULL,
    PRIMARY KEY(email)
) Engine=InnoDB;

CREATE TABLE post(
    postId INTEGER AUTO_INCREMENT NOT NULL,
    email VARCHAR(50) NOT NULL,
    textArea VARCHAR(512),
    picture VARCHAR(200),
    postTime VARCHAR(20) NOT NULL,
    PRIMARY KEY(postId),
    FOREIGN KEY(email) REFERENCES user (email)
) Engine=InnoDB;

CREATE TABLE comment(
    commentId INTEGER AUTO_INCREMENT NOT NULL,
    email VARCHAR(50) NOT NULL,
    commentText VARCHAR(512) NOT NULL,
    commentTime VARCHAR(20) NOT NULL,
    postId INTEGER NOT NULL,
    PRIMARY KEY(commentId),
    FOREIGN KEY(email) REFERENCES user(email),
    FOREIGN KEY(postId) REFERENCES post(postId)
) Engine=InnoDB;

CREATE TABLE reply(
    replyId INTEGER AUTO_INCREMENT NOT NULL,
    email VARCHAR(50) NOT NULL,
    replyText VARCHAR(512) NOT NULL,
    replyTime VARCHAR(20) NOT NULL,
    commentId INTEGER NOT NULL,
    PRIMARY KEY(replyId),
    FOREIGN KEY(email) REFERENCES user(email),
    FOREIGN KEY(commentId) REFERENCES comment(commentId)
) Engine=InnoDB;