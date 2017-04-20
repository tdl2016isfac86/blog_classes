

NOW() // Fournit un DATETIME correspondant à CURRENT_TIMESTAMP
CURDATE() // Fournit la DATE actuelle
CURTIME() // Fournit l'heure actuelle

DATE_ADD(unedate, INTERVAL qté type)
DATE_SUB(unedate, INTERVAL qté type)

DATEDIFF(unedate,unautredate)

SELECT DATEDIFF('2014-11-30','2014-11-29') AS DiffDate
-> 1

SELECT DATEDIFF('2014-11-29','2014-11-30') AS DiffDate
-> -1

SELECT COUNT(colonne) FROM table;
SELECT COUNT(DISTINCT colonne) FROM table;

SELECT SUM(category_id) FROM post_category
