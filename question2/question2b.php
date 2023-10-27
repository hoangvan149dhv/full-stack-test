SELECT SUM(total), DATE_FORMAT(updated_at,'%Y-%m')  FROM `order` WHERE `status` = 'paid'  GROUP BY  DATE_FORMAT(updated_at,'%Y-%m');








SELECT name, month, MAX(quantity)
FROM
(SELECT DATE_FORMAT(updated_at,'%Y-%m') month, m.name as name, SUM(o.quantity) as quantity
FROM `order_items` o JOIN `makers` m ON o.product_id = m.product_id
GROUP BY o.quantity, DATE_FORMAT(updated_at,'%Y-%m')
) as result
GROUP BY month;