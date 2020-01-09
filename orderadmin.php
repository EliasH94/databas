SELECT name FROM `customers` WHERE id = 1
SELECT 
orders.id, 
customer.name, 
films.title
FROM orders, customers, product
WHERE customers.id = orders.customer
AND films.id = orders.film