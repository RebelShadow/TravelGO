TYPE=VIEW
query=select `r`.`restaurant_id` AS `restaurant_id`,`r`.`restaurant_name` AS `restaurant_name`,`r`.`restaurant_specific` AS `restaurant_specific`,`r`.`restaurant_location` AS `restaurant_location`,`r`.`restaurant_open_time` AS `restaurant_open_time`,`r`.`restaurant_close_time` AS `restaurant_close_time`,`rv`.`review_id` AS `review_id`,`rv`.`user_id` AS `user_id`,`rv`.`title` AS `title`,`rv`.`stars` AS `stars`,`rv`.`body` AS `body`,`rv`.`created_at` AS `created_at` from ((`travelgo`.`restaurant` `r` join `travelgo`.`restaurant_review` `rr` on((`r`.`restaurant_id` = `rr`.`restaurant_id`))) join `travelgo`.`review` `rv` on((`rr`.`review_id` = `rv`.`review_id`)))
md5=5cc65644d6a6ad88d4cce9afc753eb1c
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2023-05-26 15:45:37
create-version=1
source=SELECT r.restaurant_id, r.restaurant_name, r.restaurant_specific, r.restaurant_location, r.restaurant_open_time, r.restaurant_close_time,\n       rv.review_id, rv.user_id, rv.title, rv.stars, rv.body, rv.created_at\nFROM restaurant r\nJOIN restaurant_review rr ON r.restaurant_id = rr.restaurant_id\nJOIN review rv ON rr.review_id = rv.review_id
client_cs_name=utf8
connection_cl_name=utf8_general_ci
view_body_utf8=select `r`.`restaurant_id` AS `restaurant_id`,`r`.`restaurant_name` AS `restaurant_name`,`r`.`restaurant_specific` AS `restaurant_specific`,`r`.`restaurant_location` AS `restaurant_location`,`r`.`restaurant_open_time` AS `restaurant_open_time`,`r`.`restaurant_close_time` AS `restaurant_close_time`,`rv`.`review_id` AS `review_id`,`rv`.`user_id` AS `user_id`,`rv`.`title` AS `title`,`rv`.`stars` AS `stars`,`rv`.`body` AS `body`,`rv`.`created_at` AS `created_at` from ((`travelgo`.`restaurant` `r` join `travelgo`.`restaurant_review` `rr` on((`r`.`restaurant_id` = `rr`.`restaurant_id`))) join `travelgo`.`review` `rv` on((`rr`.`review_id` = `rv`.`review_id`)))
