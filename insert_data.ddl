insert into Customer values
(10000000, 'odoylerules', 'Todd', 'Odoyle', '5551234567', 'example@email.com',
'Ontario', 'Kingston', '563 Princess Street', 'K7L3E5', '1234567890123456',
'2019-01-09'),
(10000001, 'flavortown', 'Guy', 'Fierri', '1111111111', 'example2@email.com',
'Ontario', 'Kingston', '564 Princess Street', 'K7L4E5', '1111111111111111',
'2019-04-12'),
(10000002, 'password', 'Michael', 'Scotte', '2222222222', 'dunder@mifflin.com',
'Ontario', 'Cornwall', '7 Main Street', 'K7L6J9', '2222222222222222', '2020-09-01'),
(10000003, 'imnotsure', 'Grace', 'Dixon', '3333333333', 'something@email.com', 'New
Brunswick', 'Fredericton', '12 Regent Street', 'E3E1S1', '333333333333333',
'2018-11-09'),
(10000004, 'electronics', 'Ravi', 'Ravioli', '4444444444', 'ravi@queensu.ca',
'Ontario', 'Kingston', '563 Division Street', 'K7R3E5', '4444444444444444', '2019-01-10')
109 ;

insert into Supplier values
('Movie supplies R us', 'Greg Movie', '9999999999', 'Ontario', 'Toronto', '17 Younge
Street', 'W2T8H8'),
('Movie supplies R them', 'Mark Movie', '1234567890', 'British Columbia', 'Victoria',
'88 Old Street', 'V5BW3E')
;

insert into Reservation values
(5, 10000000, 1, 'Kingston Cineplex', '17:30:00'),
(2, 10000001, 5, 'Toronto Cineplex', '14:00:00')
;

insert into Review values
('this movie was so good wow i liked it very much i would get others to watch the movie
it was fantastic', 5, 10000004, 'Twilight'),
('this movie was so bad wow it really was horrible i want to go home and see my family
now because this movie made me very sad', 1, 10000002, 'Jaws'),
('this movie was so average i really have no strong views on this movie', 3, 10000003,
'The Emoji Movie')
;

insert into Showing values
('Twilight', '17:30:00', 78, 1, 'Kingston Cineplex'),
('Jaws', '20:00:00', 84, 4, 'Kingston Cineplex'),
('The Emoji Movie', '14:00:00', 10, 5, 'Toronto Cineplex'),
('Spanglish', '16:30:00', 61, 1, 'Toronto Cineplex')
;

insert into Complex values
('Kingston Cineplex', 10, '0987654321', 'Ontario', 'Kingston', '123 Princess Street',
'R5H8K0'),
('Toronto Cineplex', 10, '1231231231', 'Ontario', 'Toronto', '1000 Bathurst Street',
'Z3S6F7')
;

insert into Screen values
(1, 'm', 100, 'Kingston Cineplex'),
(4, 'l', 150, 'Kingston Cineplex'),
(5, 's', 80, 'Toronto Cineplex'),
(1, 'm', 110, 'Toronto Cineplex')
;

insert into Movies (title, running, rating, plot_synopsis, actors_and_actresses, director, production_company, start_DATE, end_DATE, complex_name) values 
('Twilight', 107, 5,'Vampires and stuff I guess', 'some people', 'Stephen Spielberg', 'Movie supplies R us', '2017-11-11', '2018-4-20', 'Kingston Cineplex'), 
('Jaws', 145, 5,'Sharks and stuff I guess', 'some people','Quentin Tarantino','Movie supplies R them', '2017-12-25', '2018-4-20', 'Kingston Cineplex'), 
('The Emoji Movie',97,1,'Emojis and stuff I guess', 'some people','David Cameron', 'Movie supplies R us', '2017-10-31', '2018-4-20', 'Kingston Cineplex'), 
('Spanglish',128,3,'Spanish and stuff I guess', 'some people','Hao Miyazaki','Movie supplies R us', '2017-12-1', '2018-4-20', 'Kingston Cineplex')
;

insert into Actors values
('Twilight','Primrose Chareka'),
('Twilight','Robert Patinson'),
('Jaws','George Clooney'),
('Jaws','Dwayne Johnson'),
('Jaws','Jennifer Aniston'),
('The Emoji Movie','Joel McHale'),
('The Emoji Movie','Inigo Montoya'),
('The Emoji Movie','Will Ferrel'),
('Spanglish','Adam Sandler'),
('Spanglish','Salma Hayak'),
('Spanglish','Thea Leoni')
;