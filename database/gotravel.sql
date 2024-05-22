-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 08:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gotravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `excerpt` text NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reads` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `excerpt`, `image`, `description`, `category_id`, `created_at`, `updated_at`, `reads`) VALUES
(1, '10 Place recommendations', '10-place-recommendations', 'In the tranquility of the dawn, where the sky meets the sea in a seamless embrace, lies the promise of a new day unfolding. As the first rays of sunlight dance upon the gentle waves, a sense of serenity washes over the shore, inviting weary souls to find solace in the rhythm of the tides. This blog is dedicated to the joys and adventures of Sea Beach.', 'blog/images/ulLH3hEvOcY0UOQHsm5o1KcxCYXOE5ZOk562ER7V.jpg', '<p>Imagine the sun-kissed shores where the azure waves gently caress the golden sands. Welcome to our pristine beach destination, a paradise nestled along the breathtaking coastline. Feel the warmth of the sun on your skin as you stroll barefoot along the shoreline, the soft grains of sand massaging your feet with each step.</p><p>Dive into the crystal-clear waters, where vibrant coral reefs teem with exotic marine life, offering an unparalleled snorkeling experience. For the adventurous souls, thrilling water sports await, from exhilarating jet skiing to serene paddleboarding.</p><p>As the day transitions to dusk, witness nature\'s masterpiece as the sky transforms into a canvas of vibrant hues during the mesmerizing sunset. Indulge in delectable seafood delicacies at beachfront restaurants, accompanied by the soothing sound of lapping waves.</p><p>Retreat to luxurious beachfront accommodations, where every amenity is tailored to ensure your comfort and relaxation. Fall asleep to the gentle lullaby of the ocean, knowing that tomorrow holds another day of unforgettable experiences in this coastal haven.</p><p>Escape to our beach paradise and create timeless memories that will linger long after the tide has ebbed away.</p>', 1, '2024-04-28 09:08:12', '2024-05-19 05:17:52', 9),
(2, '12 Place recommendations', '12-place-recommendations', 'In the heart of the rugged wilderness, where the air is crisp and pure, lies a sanctuary for the soul. As the sun rises, painting the towering peaks with hues of gold and pink, a sense of awe washes over you. Each step along the winding trails is a journey of self-discovery, a testament to the resilience of the human spirit against the majestic backdrop of nature\'s grandeur.', 'blog/images/2AicjTdC4V7XJiOpHZnA3THemurmIHhlLdgm3QVa.jpg', '<p>Welcome to our mountain retreat, where adventure awaits at every turn. Nestled amidst snow-capped peaks and verdant valleys, our haven beckons to those seeking solace in the embrace of the great outdoors.</p><p>Embark on an epic journey as you traverse rugged trails, forging a connection with the untamed wilderness. Whether you\'re an avid hiker, a seasoned mountaineer, or simply a nature enthusiast, our mountain sanctuary offers something for everyone.</p><p>Immerse yourself in the tranquility of alpine meadows, where wildflowers dance in the breeze and wildlife roams freely. Lose yourself in the silence of towering forests, where ancient trees stand as silent sentinels of time.</p><p>At night, as the stars twinkle overhead like diamonds scattered across the velvet sky, gather around a crackling bonfire and share stories with fellow adventurers. Let the warmth of camaraderie kindle your spirit as you bask in the glow of newfound friendships.</p><p>As dawn breaks and the mountains are bathed in golden light, seize the opportunity to witness nature\'s spectacle. Whether you\'re scaling summits or simply basking in the beauty of the landscape, every moment spent in our mountain retreat is a treasure to be cherished.</p><p>Escape the hustle and bustle of everyday life and reconnect with the raw beauty of the natural world. Join us on a journey of discovery, where the mountains beckon and adventure awaits at every turn.</p>', 2, '2024-04-28 09:12:17', '2024-05-19 00:18:56', 2),
(4, '5 Place recommendations', '5-place-recommendations', 'Welcome to the Wild Life Travel Blog, your ultimate guide to exploring the breathtaking wonders of the natural world. From dense jungles and expansive savannas to vibrant coral reefs and towering mountain ranges, we\'ll take you on a journey to some of the most incredible wildlife destinations on the planet.', 'blog/images/1ZkFfTKJeyaArTwDkVsoTbUEsRdztFvyMFqvnedb.jpg', '<h4><strong>Experiencing Wildlife</strong></h4><p>Exploring the wild is an exhilarating experience. Whether you\'re trekking through dense forests, embarking on a safari, or diving into vibrant coral reefs, the thrill of encountering animals in their natural habitats is unparalleled.</p><h4><strong>Why Travel for Wildlife?</strong></h4><ul><li><strong>Connection with Nature:</strong> Observing animals in their natural environment fosters a deep connection with nature.</li><li><strong>Educational Experience:</strong> Learning about different species and ecosystems enhances our understanding and appreciation of the natural world.</li><li><strong>Conservation Awareness:</strong> Traveling responsibly promotes conservation efforts and supports local communities dedicated to protecting wildlife.</li></ul><h4><strong>Tips for Wildlife Travel</strong></h4><ul><li><strong>Research Your Destination:</strong> Understand the local wildlife, climate, and best times for animal sightings.</li><li><strong>Respect Wildlife:</strong> Maintain a safe distance from animals and avoid disturbing their natural behaviors.</li><li><strong>Hire a Guide:</strong> Knowledgeable guides can provide valuable insights and ensure your safety during excursions.</li><li><strong>Pack Wisely:</strong> Bring essentials like binoculars, cameras, appropriate clothing, insect repellent, and eco-friendly products.</li></ul><h4><strong>Memorable Encounters</strong></h4><ul><li><strong>Close-Up with Elephants:</strong> Witnessing a herd of elephants at a watering hole was a magical moment that left a lasting impression.</li><li><strong>Birdwatching Delight:</strong> Spotting colorful and rare birds while hiking through lush forests provided a sense of wonder and excitement.</li><li><strong>Underwater Wonders:</strong> Snorkeling alongside vibrant marine life and coral reefs offered an unforgettable underwater adventure.</li></ul><p>The Wild Life Travel Blog is your gateway to exploring the wonders of wildlife. Whether you\'re a seasoned traveler or dreaming of your first wildlife adventure, we aim to inspire and guide you on your journey. Stay tuned for more stories, tips, and insights into the incredible world of wildlife travel. Happy exploring!</p>', 4, '2024-05-19 00:28:26', '2024-05-19 02:05:05', 2),
(5, '3 Place recommendations', '3-place-recommendations', 'Road trips offer a unique sense of freedom and adventure. Whether you’re driving through scenic landscapes, exploring quaint towns, or discovering hidden gems along the way, the journey itself is as rewarding as the destination. This blog is dedicated to the joys and adventures of road trips. Here, we share stories, tips, and experiences from the open road, inspiring you to embark on your own journey.', 'blog/images/b2XzbU3i5eDv5RpSAJNn1uS5vnOY056wER6cBevo.jpg', '<h4><strong>The Joy of Road Trips</strong></h4><p>Road trips offer a unique sense of freedom and adventure. Whether you’re driving through scenic landscapes, exploring quaint towns, or discovering hidden gems along the way, the journey itself is as rewarding as the destination.</p><h4><strong>Why Take a Road Trip?</strong></h4><ul><li><strong>Flexibility:</strong> You can set your own pace, stop whenever you want, and change plans on a whim.</li><li><strong>Scenic Routes:</strong> Experience breathtaking landscapes and picturesque views that you might miss when flying.</li><li><strong>Discovery:</strong> Find off-the-beaten-path attractions, local eateries, and charming small towns.</li><li><strong>Bonding:</strong> Road trips are a great way to bond with family and friends, creating memories that last a lifetime.</li></ul><h4><strong>Tips for a Great Road Trip</strong></h4><ul><li><strong>Plan Your Route:</strong> Research your route and have a rough itinerary, but stay flexible for spontaneous detours.</li><li><strong>Pack Smart:</strong> Bring essentials like snacks, water, maps, a first aid kit, and comfortable clothing.</li><li><strong>Check Your Vehicle:</strong> Ensure your car is in good condition, with up-to-date maintenance, full tank of gas, and necessary spare parts.</li><li><strong>Stay Entertained:</strong> Create a road trip playlist, bring books, or download podcasts to keep everyone entertained.</li><li><strong>Take Breaks:</strong> Regular breaks are essential for staying alert and enjoying the journey. Stretch, explore, and take in the sights.</li></ul><h4><strong>Memorable Road Trip Moments</strong></h4><ul><li><strong>Sunset Overlook:</strong> Watching the sun set over a stunning landscape from a scenic overlook was a breathtaking experience.</li><li><strong>Unexpected Discoveries:</strong> Stumbling upon a charming roadside diner with the best homemade pie and friendly locals.</li><li><strong>Historic Landmarks:</strong> Visiting historic landmarks and learning about the local culture and history added depth to the trip.</li></ul><p>The Road Trip Blog is your go-to source for all things road trips. Whether you\'re planning a cross-country adventure or a weekend getaway, we hope to inspire and guide you on your travels. Stay tuned for more stories, tips, and insights into the wonderful world of road trips. Happy driving!</p>', 3, '2024-05-19 00:34:28', '2024-05-19 03:08:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `number_phone` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `travel_package_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `number_phone`, `date`, `travel_package_id`, `created_at`, `updated_at`) VALUES
(4, 'Swapnil Kundu', 'swapnil@gmail.com', '01727892717', '2024-05-20', 1, '2024-05-17 01:35:10', '2024-05-17 01:35:10'),
(5, 'Miraz Shihab', 'miraz@gmail.com', '01770521404', '2024-05-25', 3, '2024-05-17 03:15:54', '2024-05-17 03:15:54'),
(10, 'Miraz Shihab', 'miraz@gmail.com', '01942976655', '2024-06-14', 2, '2024-05-17 14:41:36', '2024-05-17 14:41:36'),
(11, 'Miraz Shihab', 'miraz@gmail.com', '01942976655', '2024-06-07', 4, '2024-05-18 07:02:55', '2024-05-18 07:02:55'),
(12, 'Sabikun Orthee', 'orthee@gmail.com', '01942976655', '2024-05-29', 5, '2024-05-19 00:46:42', '2024-05-19 00:46:42'),
(13, 'Sabikun Orthee', 'orthee@gmail.com', '01942976655', '2024-06-06', 6, '2024-05-19 00:47:09', '2024-05-19 00:47:09'),
(14, 'Miraz Shihab', 'miraz@gmail.com', '01942976655', '2024-05-22', 4, '2024-05-19 05:13:11', '2024-05-19 05:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Sea Beach', 'sea-beach', '2024-04-28 09:01:15', '2024-05-04 02:07:20'),
(2, 'Mountain', 'mountain', '2024-04-28 09:08:42', '2024-04-28 09:08:42'),
(3, 'Road Trips', 'road-trips', '2024-05-04 02:56:39', '2024-05-04 02:56:39'),
(4, 'Wild Experience', 'wild-experience', '2024-05-19 00:25:05', '2024-05-19 00:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `travel_package_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `name`, `images`, `travel_package_id`, `created_at`, `updated_at`) VALUES
(2, 'Tea Garden', 'travel_package/gallery/X75s7MfUNvj9RIZ6Eqv9SGToCuLnKHnZ3qPvcQu4.jpg', 1, '2024-04-28 08:55:43', '2024-05-17 15:27:54'),
(3, 'Boat Ride', 'travel_package/gallery/Q3RXKMqWjoC8Wq8tZMrbjRXcmVrjah6ppRN2Tlmo.jpg', 1, '2024-04-28 08:57:03', '2024-05-17 15:29:06'),
(4, 'Amiyakhum', 'travel_package/gallery/AxWsF3FqNkRJH1OqClnNFWLRohkPRhjfu7wnwcTQ.jpg', 2, '2024-04-28 09:00:44', '2024-05-17 15:32:01'),
(5, 'Thanchi', 'travel_package/gallery/NPixQLh6zeY1eFL5W5heD2ioGvk5JV8vWKvRei9X.jpg', 2, '2024-04-28 09:00:59', '2024-04-28 09:00:59'),
(6, 'Sunset', 'travel_package/gallery/IJn0qrtu2ovCUysxXkHZU39YLvU0tiXiBs86G7Pl.jpg', 3, '2024-04-28 09:14:39', '2024-04-28 09:14:39'),
(7, 'Morning', 'travel_package/gallery/Foj6NRWDdA6Eaq1gj2s9mV7ecvWxUCsCIvZqfc0R.jpg', 3, '2024-04-28 09:14:57', '2024-04-28 09:14:57'),
(9, 'Wild Sundarban', 'travel_package/gallery/BY7WwDUflbgU0Owuz3debbDWxuGHWHei7SAhRP8Q.jpg', 4, '2024-05-17 15:24:51', '2024-05-17 15:24:51'),
(10, 'Beauty', 'travel_package/gallery/3Uz2w0BKCFrwTc6RB5VB0MQUX1Kly2br2qq98u0U.jpg', 4, '2024-05-17 15:25:26', '2024-05-17 15:25:26'),
(11, 'Girl in Boat', 'travel_package/gallery/O9MHRwwBuArinq8CeYCoS7gjxg5NkXHoRULZ7TLD.jpg', 4, '2024-05-17 15:30:42', '2024-05-17 15:30:42'),
(12, 'Cox\'s Bazar Sea Beach', 'travel_package/gallery/IfdEQSYebi5DXhCoiER8yes8dAgFdcMmKRfz8X0c.jpg', 5, '2024-05-17 15:37:06', '2024-05-17 15:37:06'),
(13, 'Beach', 'travel_package/gallery/jyoWPqN0qXjft4Z4qFLO5LTNDYRPem5fU9dLfEfx.jpg', 5, '2024-05-17 15:37:37', '2024-05-17 15:37:37'),
(16, 'Mountain', 'travel_package/gallery/vrOQyKhHtCAZluSlNh6Ai0Y5mQazhrHQKWKXqY5b.jpg', 6, '2024-05-17 15:52:50', '2024-05-17 15:52:50'),
(17, 'Valley', 'travel_package/gallery/PedomR9QdyDfE9Sdc3JLGqjw7ycxusDwil9m2xmU.jpg', 6, '2024-05-17 15:53:49', '2024-05-17 15:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2024_05_02_000000_create_failed_jobs_table', 1),
(5, '2024_05_02_000001_create_personal_access_tokens_table', 1),
(6, '2024_05_02_050111_create_categories_table', 1),
(7, '2024_05_02_065501_create_travel_packages_table', 1),
(8, '2024_05_02_065908_create_blogs_table', 1),
(9, '2024_05_02_070324_create_bookings_table', 1),
(10, '2024_05_02_020708_create_galleries_table', 1),
(11, '2024_05_02_151237_add_reads_to_blogs_table', 1),
(12, '2024_05_13_095140_password_reset_token', 2),
(13, '2024_05_02_000000_create_failed_jobs_table', 3),
(14, '2024_05_02_000001_create_personal_access_tokens_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`id`, `email`, `token`, `created_at`) VALUES
(1, 'nahid7ar@gmail.com', 'ZZXNJJCvnTcXKF3ziJcpDKe4QPfBDClMVtggXIPL6C8mjKwTHI68kcXV0sZWGbob', '2024-05-13 03:57:52'),
(2, 'nahid7ar@gmail.com', 'vSE9QnUK5XgjMZIo5LlpAeAsPEKgBVuKA42rmtdb4fMb7N73s46ghfAv9GhLr4lK', '2024-05-13 04:01:10'),
(3, 'nahid7ar@gmail.com', 'ZXXAf94na8rjftFGNoutx9rHiNUxmcYBsPHltgx6FmEfQjzHL4IOcVPQGx1qboPQ', '2024-05-13 04:03:44'),
(4, 'nahid7ar@gmail.com', 'kyFX7m7NKONReso3KAUulBGwTD5vnutUJrgAYA8pk7VMyxcZp9K2r4iafX31BF8j', '2024-05-13 04:07:29'),
(5, 'nahid7ar@gmail.com', '9gDu0cbDqYZDl9VoA2BzvUqxNt9guynnbBvoOv0H4AiQJjCWWXKjy5ktdeNnrZjN', '2024-05-13 04:08:25'),
(6, 'nahid7ar@gmail.com', 'LPyWHVfql2gABTyCzefbjffrqDURvGDBXxDmlfMH0yuz1pF5HNGR7syITp6PWC9Y', '2024-05-13 04:10:00'),
(7, 'nahid7ar@gmail.com', 'kHslWRUjqTuD8vnaS8E9Nw5iJDypn6pmN6JPmALDpuVHbETpuAopWamXRKSI25mf', '2024-05-13 04:13:28'),
(8, 'nahid7ar@gmail.com', 'mBZ3M5xtbmerOatr9weKWXO3oApSeQ2LWBIUI4GDyoEvAn5kjhvnsvHgRTeQKlG0', '2024-05-13 04:30:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `travel_packages`
--

CREATE TABLE `travel_packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel_packages`
--

INSERT INTO `travel_packages` (`id`, `type`, `slug`, `location`, `price`, `description`, `created_at`, `updated_at`) VALUES
(1, '4D5N', 'shada-pathor-sylhet', 'Shada Pathor, Sylhet', 3000, '<p><strong>Sada Pathor (White Stone)</strong> Tourist Center is located at Bholaganj in <a href=\"https://en.wikipedia.org/wiki/Companiganj_Upazila,_Sylhet\">Companiganj Upazila</a> of Sylhet. Kompaniganj is a border Upazila located at a distance of 35 km from Sylhet city. And there is the kingdom of white stone (Sada Pathor). The place called ‘Sada Pathar’ has gained a reputation as a new tourist spot adjacent to Zero Point of Bholaganj Stone Quarry.</p><p>There are white stones scattered around. It seems that nature has spread a white bed. Clear blue water in the middle. Surrounded by a few hills, large and small. Clouds seemed to fall on him. In addition, there is green nature all around. All in all, nature is like a wonderful paradise. Tourists from far and wide flock to enjoy this wonderful place in the land of white rocks.</p><p><br><strong>Awareness and caution</strong></p><ul><li>You have no right to spoil the beauty of a place. You must not do anything that threatens the environment. Don’t throw the polythene or plastic bottles that endanger the environment without even knowing it. You should give nature the chance to survive.</li><li>The tourist spot is on the border of India. So it is better not to go near the border. Follow the instructions of Bangladesh Border Guard (BGB) members when traveling. And you can’t go into deep water even without forgetting. People who know how to swim are also in danger if they are caught in strong currents.</li><li>Try to come back as soon as possible, so that it is not evening.</li><li>Let the boatman know in advance how long you will stay in the Sada Pathor area. You can stay as long as you want.</li><li>If you want to visit Bholaganj Sada Pathar, Utmachhara, and Turangchhara in one day, you must leave very early in the morning.</li></ul>', '2024-04-28 08:51:51', '2024-05-19 00:38:13'),
(2, '4D5N', 'amiakhum-waterfall', 'Amiakhum waterfall', 4000, '<h4><strong>Kingdom Of Khum</strong></h4><p><br><strong>Amiakhum Waterfall</strong> is a magnificent waterfall located in Thanchi upazila of Bandarban district. It is one of the most inaccessible places in Bangladesh. The stream of cold water is coming down at a tremendous speed, spreading milky white foam over the green hills and stone barriers.</p><p>Tourists are mesmerized by the sound of falling water and the sound of flowing waves in the pure nature far away from the locality. The Amiakhum (Omiakhum) Falls near the Bangladesh-Myanmar border is known to many as the land of Bengal. Fascinated by the waterfall, some have called it the <i><strong>most beautiful waterfall in Bangladesh</strong></i>.</p><p>Usually every Khum is very beautiful. Their natural beauty is extraordinary. And if a few such Khum together create the Kingdom of Khum, then that’s a great thing. It is really a matter of luck to see a few beautiful khum at once. Let’s see the tour plan of Khum state.</p>', '2024-04-28 09:00:27', '2024-05-17 15:34:15'),
(3, '4D5N', 'saint-martin', 'Saint Martin', 6000, '<p>Saint Martin, a gem nestled in the heart of the Caribbean, beckons travelers with its pristine beaches, vibrant culture, and enchanting landscapes. Located in the northeastern Caribbean Sea, this idyllic island is divided between the French collectivity of Saint Martin and the Dutch territory of Sint Maarten, offering a rich tapestry of cultural influences.</p><p>On the French side, discover the allure of secluded coves and turquoise waters that fringe palm-fringed shores. Indulge in delectable French cuisine at charming bistros tucked away in quaint villages, where the aroma of freshly baked baguettes mingles with the salty sea breeze. Explore the vibrant markets and art galleries, where local artisans showcase their talents through colorful paintings and intricate crafts.</p><p>Crossing over to the Dutch side, Sint Maarten captivates with its bustling atmosphere and cosmopolitan flair. Enjoy duty-free shopping in Philipsburg, where luxury boutiques and lively casinos line the streets. Dive into the azure depths to explore vibrant coral reefs teeming with marine life, or embark on a sailing adventure to secluded islets dotting the horizon.</p><p>For the adventurous spirit, Saint Martin offers a myriad of outdoor activities, from hiking scenic trails to zip-lining through lush rainforests. Take in panoramic views from atop Pic Paradis, the island\'s highest point, or unwind on pristine beaches like Orient Bay and Maho Beach, famous for its thrilling airplane landings just meters above sunbathers.</p><p>Whether you seek relaxation on sun-drenched shores, cultural immersion in charming towns, or adrenaline-pumping adventures in the great outdoors, Saint Martin invites you to experience the magic of the Caribbean in all its splendor.</p>', '2024-04-28 09:14:23', '2024-05-19 00:38:22'),
(4, '3D4N', 'sundarban', 'Sundarban', 6000, '<p><strong>The Sundarbans</strong>, one of the most attractive places in Bangladesh, is the largest mangrove forest in the world. Visitors feel great enthusiasm and fascination to come to this nature’s bounties of exceptional character. The forest is a World Heritage Site for its extra-ordinary vegetation and diverse ecological balance. No other tidal forests can match it in terms of diversity. Wonderful flora and fauna, divergent wildlife, paramount beauty of green canopy, thousands of meandering Streams, rivers, creeks made this forest one of the great eco-tourism attractions. The forest is famous as the primitive abode of the royal Bengal Tiger, the strongest, and most beautiful wild animal of the world.</p><p>The Sundarbans is a mangrove area in the delta formed by the confluence of the Ganges, Brahmaputra, and Meghna Rivers in the Bay of Bengal. It spans from the Hooghly River in India\'s state of West Bengal to the Baleswar River in Bangladesh. It comprises closed and open mangrove forests, agriculturally used land, mudflats, and barren land, and is intersected by multiple tidal streams and channels. Four protected areas in the Sundarbans are enlisted as UNESCO World Heritage Sites, viz Sundarbans National Park, Sundarbans West, Sundarbans South, and Sundarbans East Wildlife Sanctuaries. The Sundarbans mangrove forest covers an area of about 10,000 km2 (3,900 sq mi), of which forests in Bangladesh\'s Khulna Division extend over 6,017 km2 (2,323 sq mi) and in West Bengal, they extend over 4,260 km2 (1,640 sq mi) across the South 24 Parganas and North 24 Parganas districts. The most abundant tree species are sundri (Heritiera fomes) and gewa (Excoecaria agallocha). The forests provide habitat to 453 faunal wildlife, including 290 birds, 120 fish, 42 mammals, 35 reptiles, and eight amphibian species.</p>', '2024-05-17 15:23:55', '2024-05-17 15:23:55'),
(5, '3D4N', 'coxs-bazar', 'Cox\'s Bazar', 7000, '<p><strong>Cox\'s Bazar</strong> is a renowned coastal town located in southeastern Bangladesh. Known for its long, unbroken stretch of sandy beach along the Bay of Bengal, it is considered the longest natural sea beach in the world, stretching over approximately 120 kilometers (75 miles). Here’s a detailed description:</p><h4><strong>Geography and Climate</strong></h4><p>Cox\'s Bazar is situated in the Chittagong Division and is bordered by the Bay of Bengal to the west. The town\'s geography is characterized by sandy beaches, rolling hills, and lush tropical forests. The climate is tropical, with a hot and humid summer, a monsoon season, and a mild winter.</p><h4><strong>Main Attractions</strong></h4><ol><li><strong>Cox\'s Bazar Beach</strong>: The main attraction, famous for its extensive sandy shoreline, gentle waves, and breathtaking sunsets.</li><li><strong>Himchari National Park</strong>: Known for its waterfalls and diverse wildlife, it\'s a popular spot for nature lovers.</li><li><strong>Inani Beach</strong>: Another picturesque beach located about 32 kilometers south of Cox\'s Bazar, known for its unique coral stones.</li><li><strong>Saint Martin\'s Island</strong>: A small island in the Bay of Bengal, known for its coral reefs and marine life, accessible by boat from Teknaf.</li><li><strong>Maheshkhali Island</strong>: Notable for its hills and the Adinath Temple, offering a blend of natural beauty and cultural heritage.</li></ol><h4><strong>Cultural and Historical Significance</strong></h4><p>Cox\'s Bazar has a rich cultural heritage with influences from various communities, including the Rakhine, Marma, and Chakma tribes. The town was named after Captain Hiram Cox, an officer of the British East India Company, who worked to rehabilitate Arakanese refugees in the late 18th century.</p>', '2024-05-17 15:36:38', '2024-05-17 15:36:38'),
(6, '3D4N', 'sajek-valley', 'Sajek Valley', 7000, '<h3><strong>Sajek Valley</strong></h3><p>Sajek Valley, nestled in the Rangamati District of the Chittagong Hill Tracts in Bangladesh, has emerged as a prime destination for tourists seeking natural beauty, adventure, and cultural experiences. Known for its lush green hills, serene environment, and stunning vistas, Sajek Valley is often referred to as the \"Queen of Hills and Roof of Rangamati.\"</p><h4><strong>Key Attractions</strong></h4><ul><li><strong>Sajek Valley Viewpoints</strong>: The valley offers breathtaking panoramic views of the hills, valleys, and the Sajek River. The landscape is often shrouded in mist, creating a magical and serene atmosphere.</li><li><strong>Konglak Hill</strong>: This hill is one of the highest peaks in the area and is a favorite spot for trekking. Visitors can enjoy stunning sunrise and sunset views from the summit, making it a must-visit for nature lovers and photographers.</li><li><strong>Helipad Area</strong>: A flat area used as a helipad that doubles as a popular viewpoint. It offers expansive views of the surrounding hills and valleys, making it a great spot for taking photographs and enjoying the natural beauty.</li><li><strong>Ruilui Para and Konglak Para</strong>: These are two prominent indigenous villages in the valley. Visitors can explore these villages to experience the local culture, traditions, and lifestyle of the indigenous communities, including the Chakma, Marma, and Tripura tribes.</li><li><strong>Hiking and Trekking Trails</strong>: Sajek Valley has numerous trails that are perfect for hiking and trekking enthusiasts. These trails provide opportunities to explore the dense forests, rolling hills, and diverse flora and fauna of the region.</li></ul><h4><strong>Accommodation and Facilities</strong></h4><ol><li><strong>Resorts and Cottages</strong>: The valley has seen the development of several resorts and cottages that offer comfortable accommodations with stunning views of the hills. Popular options include Sajek Resort, Meghpunji Resort, and Rungrang Cottage, among others.</li><li><strong>Local Eateries and Restaurants</strong>: There are several local eateries and restaurants where visitors can enjoy traditional Bangladeshi cuisine as well as local tribal dishes. Fresh fruits, especially pineapples and bananas, are widely available.</li><li><strong>Transportation</strong>: The journey to Sajek Valley is an adventure in itself, with winding roads that offer scenic views. Tourists typically travel by car or jeep from Khagrachari, the nearest major town, which is about 70 kilometers away. The road to Sajek, though challenging, adds to the overall experience.</li></ol>', '2024-05-17 15:50:41', '2024-05-17 15:50:41');

-- --------------------------------------------------------

--
-- Table structure for table `travel_user`
--

CREATE TABLE `travel_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel_user`
--

INSERT INTO `travel_user` (`id`, `name`, `email`, `phone`, `password`, `created_at`, `updated_at`) VALUES
(5, 'Miraz Shihab', 'miraz@gmail.com', '01942976655', '$2y$10$VxoZVdmVYmrVA1G40fvz4.SB2wf18kf2FxDsxeU9TWoYSmPXsHD3y', '2024-05-17 01:18:33', '2024-05-17 01:18:33'),
(6, 'Swapnil Kundu', 'swapnil@gmail.com', '01727892717', '$2y$10$yXEiRDh2JFQiW.oKf8ZXY.wgldgnR/h0p9Wqn9Wc0DTiqj8DlAmfK', '2024-05-17 01:34:28', '2024-05-17 01:34:28'),
(7, 'Sabikun Orthee', 'orthee@gmail.com', '01942976655', '$2y$10$DOS42bPa.cZRTV1lYEhsoeABPKOQQpsF4fK.0Z.GX8G0jGl3SPPaq', '2024-05-19 00:46:16', '2024-05-19 00:46:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Arefin Nahid', 'nahid7ar@gmail.com', NULL, '$2y$10$RuEsDgGeH6bjfhDbAOwKmuOKSBU/GOU0ainTfDudAxERoE/9158S.', 'ncOT6MCYA3kUUDYGz3SjLtCYh482oF0dy8VGKwjWivwNorFI14a2986NZswm', 1, '2024-04-28 08:44:52', '2024-05-17 16:17:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blogs_slug_unique` (`slug`),
  ADD KEY `blogs_category_id_foreign` (`category_id`),
  ADD KEY `blogs_reads_index` (`reads`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_travel_package_id_foreign` (`travel_package_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_travel_package_id_foreign` (`travel_package_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `travel_packages`
--
ALTER TABLE `travel_packages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `travel_packages_slug_unique` (`slug`);

--
-- Indexes for table `travel_user`
--
ALTER TABLE `travel_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `travel_packages`
--
ALTER TABLE `travel_packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `travel_user`
--
ALTER TABLE `travel_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_travel_package_id_foreign` FOREIGN KEY (`travel_package_id`) REFERENCES `travel_packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_travel_package_id_foreign` FOREIGN KEY (`travel_package_id`) REFERENCES `travel_packages` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
