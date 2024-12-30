<?php 

return "SELECT 
exchangerate.id AS id,
exchangerate.updated_at AS updated_at,
is_default,
base_amount,
target_amount,
rate,
base_currency.id AS base_id,
base_currency.name AS base_name,
base_currency.image AS base_image,
base_currency.symbol AS base_symbol,
target_currency.id AS target_id,
target_currency.name AS target_name,
target_currency.symbol AS target_symbol,
target_currency.image AS target_image
FROM 
exchangerate
JOIN 
currency AS base_currency 
ON exchangerate.base_currency_id = base_currency.id
JOIN 
currency AS target_currency 
ON exchangerate.target_currency_id = target_currency.id";