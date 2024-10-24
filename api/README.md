# 其餘題目

## 題目一

Q1. 請寫出一條 SQL，列出在 2023/5 下訂的訂單，使用台幣付款，且 5 月總金額最多的前十筆的旅宿 ID（bnb_id）、旅宿名稱（bnb_name）及 5 月總金額（may_amount）

```
SELECT bnbs.id AS bub_id, bnbs.name AS bnb_name, SUM(orders.amount) AS may_amount
FROM orders
LEFT JOIN bnbs ON bnbs.id = orders.bnb_id
WHERE orders.created_at >= '2024-05-01' AND orders.created_at <= '2024-05-31' AND orders.currency = 'TWD'
GROUP BY bnbs.id, bnbs.name
ORDER BY SUM(orders.amount) DESC
LIMIT 10
```

Q2. 在 Q1 的執行下，發現 SQL 執行速度很慢，會怎麼去優化？

1. 增加 index
    1. orders: bnb_id+created_at+currrency
    1. bnbs: id+name
1. 如果接受不是最即時的資料（例如前一日報表使用）的話
    1. 新增一張給報表使用的表 orders_analysis，欄位有 bnb_id, bnb_name, year, month, monthly_total_amount
    1. 每增加一筆訂單後，將該訂單丟進 job queue，用該訂單的 amount 與 created_at 排隊更新 orders_analysis.monthly_total_amount，必要的話更新後同步更新 cache


Q1 還有一種是 subquery+inner join

```
SELECT bnbs.id, bnbs.name, rank.total_amount AS may_amount
FROM bnbs
INNER JOIN (
    SELECT orders.bnb_id, SUM(orders.amount) AS total_amount
    FROM orders
    WHERE orders.created_at >= '2024-05-01' AND orders.created_at <= '2024-05-31' AND orders.currency = 'TWD'
    GROUP BY orders.bnb_id
    ORDER BY total_amount DESC
    LIMIT 10
) AS rank ON rank.bnb_id = bnbs.id
ORDER BY may_amount DESC;
```

order 打上一樣的 index，bnbs 打上 id。兩種的話 explain 後是 inner join 比較好。

## 題目二（API）

SOLID 的部分看來使用了 Open-closed priciple 而已。設計模式沒特別設計。