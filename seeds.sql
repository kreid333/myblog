DROP TABLE IF EXISTS posts;

CREATE TABLE posts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    img VARCHAR(255),
    date VARCHAR(255),
    title VARCHAR(255),
    content VARCHAR(255),
    tag VARCHAR(255)
);

INSERT INTO posts(img, date, title, content, tag) VALUES(
    "https://images.pexels.com/photos/1089306/pexels-photo-1089306.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940",
    "2021-07-31",
    "Traveling with United Airlines",
    "I'm baby viral hoodie gentrify food truck, tumeric lomo crucifix succulents banjo hexagon organic wolf 3 wolf moon truffaut. Adaptogen bespoke helvetica disrupt kinfolk tumeric hella cardigan 3 wolf moon +1 try-hard pok pok. Put a bird on it heirloom godard, coloring book vinyl slow-carb aesthetic vape cliche ethical 3 wolf moon kale chips fixie woke cornhole. Yuccie vegan man bun gluten-free single-origin coffee, raw denim ennui prism umami before they sold out humblebrag williamsburg shoreditch. Vegan selfies fashion axe pok pok tbh viral, unicorn narwhal aesthetic hammock. Kogi scenester quinoa taiyaki green juice next level cray tousled tbh yuccie keytar pug.",
    "TRAVEL"
);

INSERT INTO posts(img, date, title, content, tag) VALUES(
    "https://images.pexels.com/photos/1030928/pexels-photo-1030928.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940",
    "2021-07-31",
    "Best cameras of 2021",
    "I'm baby viral hoodie gentrify food truck, tumeric lomo crucifix succulents banjo hexagon organic wolf 3 wolf moon truffaut. Adaptogen bespoke helvetica disrupt kinfolk tumeric hella cardigan 3 wolf moon +1 try-hard pok pok. Put a bird on it heirloom godard, coloring book vinyl slow-carb aesthetic vape cliche ethical 3 wolf moon kale chips fixie woke cornhole. Yuccie vegan man bun gluten-free single-origin coffee, raw denim ennui prism umami before they sold out humblebrag williamsburg shoreditch. Vegan selfies fashion axe pok pok tbh viral, unicorn narwhal aesthetic hammock. Kogi scenester quinoa taiyaki green juice next level cray tousled tbh yuccie keytar pug.",
    "PHOTOGRAPHY"
);

INSERT INTO posts(img, date, title, content, tag) VALUES(
    "https://images.pexels.com/photos/1181467/pexels-photo-1181467.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940",
    "2021-07-31",
    "Best IDE for Node.js development",
    "I'm baby viral hoodie gentrify food truck, tumeric lomo crucifix succulents banjo hexagon organic wolf 3 wolf moon truffaut. Adaptogen bespoke helvetica disrupt kinfolk tumeric hella cardigan 3 wolf moon +1 try-hard pok pok. Put a bird on it heirloom godard, coloring book vinyl slow-carb aesthetic vape cliche ethical 3 wolf moon kale chips fixie woke cornhole. Yuccie vegan man bun gluten-free single-origin coffee, raw denim ennui prism umami before they sold out humblebrag williamsburg shoreditch. Vegan selfies fashion axe pok pok tbh viral, unicorn narwhal aesthetic hammock. Kogi scenester quinoa taiyaki green juice next level cray tousled tbh yuccie keytar pug.",
    "TECH"
);

INSERT INTO posts(img, date, title, content, tag) VALUES(
    "https://images.pexels.com/photos/2190283/pexels-photo-2190283.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500",
    "2021-07-31",
    "My experience in New York",
    "I'm baby viral hoodie gentrify food truck, tumeric lomo crucifix succulents banjo hexagon organic wolf 3 wolf moon truffaut. Adaptogen bespoke helvetica disrupt kinfolk tumeric hella cardigan 3 wolf moon +1 try-hard pok pok. Put a bird on it heirloom godard, coloring book vinyl slow-carb aesthetic vape cliche ethical 3 wolf moon kale chips fixie woke cornhole. Yuccie vegan man bun gluten-free single-origin coffee, raw denim ennui prism umami before they sold out humblebrag williamsburg shoreditch. Vegan selfies fashion axe pok pok tbh viral, unicorn narwhal aesthetic hammock. Kogi scenester quinoa taiyaki green juice next level cray tousled tbh yuccie keytar pug.",
    "TRAVEL"
);