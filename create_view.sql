CREATE 
    ALGORITHM = UNDEFINED 
    DEFINER = `root`@`localhost` 
    SQL SECURITY DEFINER
VIEW `book_brief_view` AS
    SELECT 
        `author`.`authorname` AS `authorname`,
        `author`.`avatar` AS `authoravatar`,
        `book`.`id` AS `bookid`,
        `book`.`bookname` AS `bookname`,
        `book`.`price` AS `price`,
        `book`.`updated` AS `updated`,
        `book`.`quantity` AS `quantity`,
        `category`.`categoryname` AS `categoryname`,
        `publisher`.`publishername` AS `publishername`,
        `book`.`cover` AS `cover`,
        `book`.`description` AS `description`
    FROM
        (((`author`
        JOIN `book`)
        JOIN `category`)
        JOIN `publisher`)
    WHERE
        ((`author`.`id` = `book`.`authorid`)
            AND (`book`.`categoryid` = `category`.`id`)
            AND (`book`.`publisherid` = `publisher`.`id`))