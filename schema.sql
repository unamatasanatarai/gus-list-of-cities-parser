
DROP TABLE IF EXISTS `geo_cities`;

CREATE TABLE `geo_cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gov_province_id` int(10) unsigned DEFAULT NULL,
  `gov_county_id` int(10) unsigned DEFAULT NULL,
  `gov_community_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `geo_cities_gov_province_id_index` (`gov_province_id`),
  KEY `geo_cities_gov_county_id_index` (`gov_county_id`),
  KEY `geo_cities_gov_community_id_index` (`gov_community_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `geo_communities`;

CREATE TABLE `geo_communities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gov_id` int(10) unsigned NOT NULL,
  `gov_county_id` int(10) unsigned DEFAULT NULL,
  `gov_province_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `geo_communities_gov_county_id_index` (`gov_county_id`),
  KEY `geo_communities_gov_province_id_index` (`gov_province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



DROP TABLE IF EXISTS `geo_counties`;

CREATE TABLE `geo_counties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gov_id` int(10) unsigned NOT NULL,
  `gov_province_id` int(10) unsigned DEFAULT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `geo_counties_gov_province_id_index` (`gov_province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `geo_provinces`;

CREATE TABLE `geo_provinces` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `gov_id` int(10) unsigned NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
