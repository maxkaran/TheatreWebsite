CREATE TABLE Customer (
  account_number INTEGER NOT NULL,
  password VARCHAR(50) NOT NULL,
  first_name VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  phone_number CHAR(10),
  email VARCHAR(50),
  province VARCHAR(50),
  city VARCHAR(50),
  street_address VARCHAR(100),
  postal_code CHAR(6),
  credit_card_number CHAR(16) NOT NULL,
  credit_card_expiry DATE NOT NULL,
  PRIMARY KEY (account_number)
);

CREATE TABLE Supplier (
  name VARCHAR(50) NOT NULL,
  contact_name VARCHAR(50) NOT NULL,
  phone_number CHAR(10) NOT NULL,
  province VARCHAR(50),
  city VARCHAR(50),
  street_address VARCHAR(100),
  postal_code VARCHAR(6),
  PRIMARY KEY (name)
);

CREATE TABLE Complex (
  name VARCHAR(50) NOT NULL,
  number_screens INTEGER NOT NULL,
  phone_number CHAR(10),
  province VARCHAR(50),
  city VARCHAR(50),
  street_address VARCHAR(100),
  postal_code VARCHAR(50),
  PRIMARY KEY (name)
);

CREATE TABLE Screen (
  screen_number INTEGER NOT NULL,
  screen_size CHAR(1) NOT NULL,
  number_seats INTEGER NOT NULL,
  complex_name VARCHAR(50) NOT NULL,
  PRIMARY KEY (screen_number, complex_name),
  FOREIGN KEY(complex_name) REFERENCES Complex(name)
);

CREATE TABLE Movies (
  title VARCHAR(50) NOT NULL,
  running INTEGER NOT NULL,
  rating INTEGER NOT NULL,
  plot_synopsis VARCHAR(250),
  actors_and_actresses VARCHAR(250),
  director VARCHAR(50),
  production_company VARCHAR(50) NOT NULL,
  start_DATE DATE NOT NULL,
  end_DATE DATE NOT NULL,
  complex_name VARCHAR(50) NOT NULL,
  PRIMARY KEY (title),
  FOREIGN KEY (production_company) REFERENCES Supplier(name),
  FOREIGN KEY (complex_name) REFERENCES Complex(name)
);

CREATE TABLE Showing (
  movie_title VARCHAR(50) NOT NULL,
  start_time TIME NOT NULL,
  available_seats INTEGER NOT NULL,
  screen_number INTEGER NOT NULL,
  complex_name VARCHAR(50) NOT NULL,
  PRIMARY KEY (start_time, screen_number, complex_name),
  FOREIGN KEY (screen_number) REFERENCES Screen(screen_number),
  FOREIGN KEY (complex_name) REFERENCES Complex(name)
);


CREATE TABLE Reservation (
  number_tickets INTEGER NOT NULL,
  account_number INTEGER NOT NULL,
  screen_number INTEGER NOT NULL,
  complex_name VARCHAR(50) NOT NULL,
  start_time TIME NOT NULL,
  PRIMARY KEY(account_number, screen_number, complex_name, start_time),
  FOREIGN KEY(account_number) REFERENCES Customer(account_number),
  FOREIGN KEY(screen_number) REFERENCES Showing(screen_number),
  FOREIGN KEY(complex_name) REFERENCES Showing(complex_name),
  FOREIGN KEY(start_time) REFERENCES Showing(start_time)

);

CREATE TABLE Review (
  review_body VARCHAR(250) NOT NULL,
  stars INTEGER NOT NULL,
  account_number INTEGER NOT NULL,
  movie_title VARCHAR(50),
  PRIMARY KEY(movie_title, account_number),
  FOREIGN KEY(movie_title) REFERENCES Movies(title),
  FOREIGN KEY(account_number) REFERENCES Customer(account_number)
);