INSERT INTO users ( user_name, gender, email, password, picture, verify )
 VALUES( 'Abdulhai', 'Male', 'safiabd@gmail.com', 'admin', 'default.jpg', 'verified' ),
 ( 'khan', 'Male', 'khan124@yahoo.com', 'admin123', 'default.jpg', 'verified' );
INSERT INTO categories( name)
VALUES('General'),('Political'),('Sports'),('Economies');

INSERT INTO posts(
title,
post,
category_id,
user_id,
thumbnail

)VALUES(
'National Reports',
't is a long established fact that a reader will b
e distracted by the readable content of a page when looking
at its layout. The point of using Lorem Ipsum is that it ha
s a more-or-less normal distribution of letters, as opposed
to using Content here, content here, making it look like
readable English. Many desktop publishing packages and
web page editors now use Lorem Ipsum as their default
model text, and a search for lorem ipsum
will uncover many web sites still in their
infancy. Various versions have evolved over th
e years, sometimes by accident, sometimes on purpose
(injected humour and the like).',
1,
1,
'1.jpg'
),
(
'The Peoples Voice.',
't is a long established fact that a reader will b
e distracted by the readable content of a page when looking
at its layout. The point of using Lorem Ipsum is that it ha
s a more-or-less normal distribution of letters, as opposed
to using Content here, content here, making it look like
readable English. Many desktop publishing packages and
web page editors now use Lorem Ipsum as their default
model text, and a search for lorem ipsum
will uncover many web sites still in their
infancy. Various versions have evolved over th
e years, sometimes by accident, sometimes on purpose
(injected humour and the like).',
2,
2,
'2.jpg'
);
