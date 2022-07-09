CREATE TABLE archive_grain (
  id int(11) NOT NULL,
  date varchar(20) NOT NULL,
  username varchar(50) NOT NULL,
  strain varchar(50) NOT NULL,
  location varchar(50) NOT NULL,
  label varchar(10) NOT NULL,
  source varchar(20) NOT NULL,
  contam int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE archive_petri (
  id int(11) NOT NULL,
  date varchar(20) NOT NULL,
  username varchar(50) NOT NULL,
  strain varchar(50) NOT NULL,
  location varchar(50) NOT NULL,
  label varchar(10) NOT NULL,
  description varchar(30) NOT NULL,
  dishes int(3) NOT NULL,
  contam int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE archive_spawn (
  id int(11) NOT NULL,
  date varchar(20) NOT NULL,
  username varchar(50) NOT NULL,
  strain varchar(50) NOT NULL,
  location varchar(50) NOT NULL,
  label varchar(10) NOT NULL,
  tubs int(3) NOT NULL,
  contam int(3) NOT NULL,
  fruit varchar(14) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE grain (
  id int(11) NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  username varchar(50) NOT NULL,
  strain varchar(50) NOT NULL,
  location varchar(50) NOT NULL,
  label varchar(10) NOT NULL,
  source varchar(20) NOT NULL,
  contam int(3) NOT NULL DEFAULT '0',
  active int(3) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE harvest (
  id int(11) NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  username varchar(50) NOT NULL,
  strain varchar(50) NOT NULL,
  location varchar(50) NOT NULL,
  label varchar(10) NOT NULL,
  flush int(3) NOT NULL,
  wet decimal(30,2) NOT NULL DEFAULT '0.00',
  dry decimal(30,2) NOT NULL DEFAULT '0.00',
  available decimal(30,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE location (
  id int(2) NOT NULL,
  location varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO location (id, location) VALUES
(1, 'Home');

CREATE TABLE LogAccountAdd (
  ID int(11) NOT NULL,
  user varchar(200) NOT NULL,
  admin varchar(20) NOT NULL,
  IP varchar(20) NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE LogAccountDel (
  ID int(11) NOT NULL,
  user varchar(200) NOT NULL,
  admin varchar(20) NOT NULL,
  IP varchar(20) NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE LogAccountEdit (
  ID int(11) NOT NULL,
  user varchar(200) NOT NULL,
  admin varchar(20) NOT NULL,
  IP varchar(20) NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE LoginAttempts (
  ID int(11) NOT NULL,
  user varchar(200) NOT NULL,
  IP varchar(20) NOT NULL,
  successful varchar(3) NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE LogSearch (
  ID int(11) NOT NULL,
  user varchar(200) NOT NULL,
  search varchar(70) NOT NULL,
  type varchar(20) NOT NULL,
  page varchar(70) NOT NULL,
  IP varchar(20) NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE LogSubmit (
  ID int(11) NOT NULL,
  user varchar(200) NOT NULL,
  label varchar(70) NOT NULL,
  page varchar(70) NOT NULL,
  IP varchar(20) NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE notes (
  id int(11) NOT NULL,
  user varchar(50) NOT NULL,
  content varchar(1024) NOT NULL,
  updated timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO notes (id, `user`, content, updated) VALUES
(1, 'admin', 'Welcome. Please add notes as you desire.', '2022-07-08 17:56:15');

CREATE TABLE petri (
  id int(11) NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  username varchar(50) NOT NULL,
  strain varchar(50) NOT NULL,
  location varchar(50) NOT NULL,
  label varchar(10) NOT NULL,
  description varchar(50) NOT NULL,
  dishes int(3) NOT NULL,
  contam int(3) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE spawn (
  id int(11) NOT NULL,
  date datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  username varchar(50) NOT NULL,
  strain varchar(50) NOT NULL,
  location varchar(50) NOT NULL,
  label varchar(10) NOT NULL,
  tubs int(3) NOT NULL,
  contam int(3) NOT NULL DEFAULT '0',
  fruit varchar(14) NOT NULL DEFAULT '2022-?-?'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE spores (
  id int(11) NOT NULL,
  strain varchar(50) NOT NULL,
  description varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO spores (id, strain, description) VALUES
(1, 'Blue Oyster', 'Attractive Pearl Oyster');

CREATE TABLE users (
  id int(11) NOT NULL,
  username varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  admin int(1) NOT NULL DEFAULT '0',
  canimport int(1) NOT NULL DEFAULT '0',
  adminadd int(1) NOT NULL DEFAULT '0',
  created_by varchar(50) NOT NULL,
  created_at datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO users (id, username, `password`, admin, canimport, adminadd, created_by, created_at) VALUES
(1, 'admin', '$2y$10$P2Tv9zwTWt/dG7Orsm0gCOMEIA7mgs1emDQDvZikcbuil7d9HdDli', 1, 1, 0, 'jesus', '2022-07-08 17:56:15');


ALTER TABLE archive_grain
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY arcihve_id (id);

ALTER TABLE archive_petri
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY archive_id (id);

ALTER TABLE archive_spawn
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY archive_id (id);

ALTER TABLE grain
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);

ALTER TABLE harvest
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);

ALTER TABLE location
  ADD PRIMARY KEY (id);

ALTER TABLE LogAccountAdd
  ADD PRIMARY KEY (ID),
  ADD UNIQUE KEY ID (ID);

ALTER TABLE LogAccountDel
  ADD PRIMARY KEY (ID),
  ADD UNIQUE KEY ID (ID);

ALTER TABLE LogAccountEdit
  ADD PRIMARY KEY (ID),
  ADD UNIQUE KEY ID (ID);

ALTER TABLE LoginAttempts
  ADD PRIMARY KEY (ID);

ALTER TABLE LogSearch
  ADD PRIMARY KEY (ID);

ALTER TABLE LogSubmit
  ADD PRIMARY KEY (ID);

ALTER TABLE notes
  ADD PRIMARY KEY (id);

ALTER TABLE petri
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);

ALTER TABLE spawn
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);

ALTER TABLE spores
  ADD PRIMARY KEY (id);

ALTER TABLE users
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY id (id);


ALTER TABLE archive_grain
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE archive_petri
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE archive_spawn
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE grain
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE harvest
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE location
  MODIFY id int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE LogAccountAdd
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

ALTER TABLE LogAccountDel
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE LogAccountEdit
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE LoginAttempts
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

ALTER TABLE LogSearch
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE LogSubmit
  MODIFY ID int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

ALTER TABLE notes
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE petri
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE spawn
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE spores
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

ALTER TABLE users
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;