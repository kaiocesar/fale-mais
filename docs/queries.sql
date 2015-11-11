-- Lista as areas
select * from areas where status = 1


-- Lista os planos
select * from plans where status = 1


-- Lista as tarifas das combinações de areas
select * from rates where status = 1

-- Lista a taxa do valor do minuto excedente sobre cada combinação de tarifa
select
if (pc.flag_cursor = 0, u1.code, u2.code) as origin,
if (pc.flag_cursor = 1, u1.code, u2.code) as destination,
pc.time, pl.name, pc.rate_min_with, pc.rate_min_without
from phone_calls pc
left join plans pl
on pl.id = pc.plans_id
left join rates ra
on ra.id = pc.rates_id
left join areas u1 on (u1.id = ra.area_origin_id)
left join areas u2 on (u2.id = ra.area_destination_id)

-- Consulta o plano
-- Plano = 1 e tempo igual a 21
-- ddd origem 1  e ddd destinatario 2
select
if (pc.flag_cursor = 0, u1.code, u2.code) as origin,
if (pc.flag_cursor = 1, u1.code, u2.code) as destination,
pc.time, pl.name,
if (pc.time < 21 and pc.rate_min_with > 0, pc.rate_min_with + ((pc.rate_min_with * 0.10) * (21-pc.time)), pc.rate_min_with) as val_with,
if (pc.time < 21 and pc.rate_min_without > 0, ((pc.rate_min_without * 0.10) * (21-pc.time))+pc.rate_min_without , pc.rate_min_without) as val_without
from phone_calls pc
left join plans pl
on pl.id = pc.plans_id
left join rates ra
on ra.id = pc.rates_id
left join areas u1 on (u1.id = ra.area_origin_id)
left join areas u2 on (u2.id = ra.area_destination_id)
where pl.id = 1 and ra.area_origin_id = 1 and ra.area_destination_id = 2