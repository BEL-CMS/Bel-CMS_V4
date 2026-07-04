<?php
/**
 * Bel-CMS [Content management system]
 * @version 4.0.1 [PHP8.4]
 * @link https://bel-cms.dev
 * @link https://determe.be
 * @license MIT License
 * @copyright 2015-2026 Bel-CMS
 * @author as Stive - stive@determe.be
 */

namespace BelCMS\Core;

use BelCMS\PDO\BDD;

class Visitors
{
    private static array $bots = [
        'googlebot',
        'bingbot',
        'slurp',
        'duckduckbot',
        'baiduspider',
        'yandex',
        'crawler',
        'spider',
        'bot'
    ];

    /**
     * Enregistrer visiteur
     */
    public static function register(): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $sessionId = session_id();
        $ip        = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        $page = $_SERVER['REQUEST_URI'] ?? '/';
        $page = trim($page, '//');
        $page = parse_url($page, PHP_URL_PATH);

        // Retire le /        
        $page = trim($page, '/');

        // Coupe l'URL
        $explode = explode('/', $page);

        // Garde uniquement le premier paramètre
        $page = $explode[0] ?? '';

        // Accueil
        if (empty($page)) {
            $page = 'Accueil';
        }

        // Ignore assets
        if (self::isIgnoredPage($page) === false) {
            $page = 'index';
        }

        $isBot = self::isBot($userAgent) ? 1 : 0;

        $userId   = 0;
        $username = null;

        // Compatible User Bel-CMS
        if (isset($_SESSION['USER'])) {

            $userId = (int) ($_SESSION['USER']->user->hash_key ?? 0);

            $username = $_SESSION['USER']->user->username
                ?? $_SESSION['USER']->user->username
                ?? null;
        }

        $country = self::getCountryCode($ip);

        $time = time();

        // ==========================================
        // DELETE EXPIRE
        // ==========================================

        $sql = new BDD;
        $sql->table('TABLE_VISITORS_ONLINE');
        $sql->where([
            'name'  => 'last_activity',
            'op'    => '<',
            'value' => ($time - 300)
        ]);
        $sql->delete();

        // ==========================================
        // CHECK SESSION
        // ==========================================

        $sql = new BDD;
        $sql->table('TABLE_VISITORS_ONLINE');
        $sql->fields(['id']);
        $sql->where([
            'name'  => 'session_id',
            'value' => $sessionId
        ]);
        $sql->queryOne();

        // ==========================================
        // UPDATE
        // ==========================================

        if (!empty($sql->data->id)) {

            $update = new BDD;
            $update->table('TABLE_VISITORS_ONLINE');

            $update->where([
                'name'  => 'session_id',
                'value' => $sessionId
            ]);

            $update->update([

                'ip'            => $ip,
                'country'       => $country,
                'user_id'       => $userId,
                'username'      => $username,
                'user_agent'    => $userAgent,
                'page'          => $page,
                'is_bot'        => $isBot,
                'last_activity' => $time

            ]);

        } else {

            // ==========================================
            // INSERT
            // ==========================================

            $insert = new BDD;
            $insert->table('TABLE_VISITORS_ONLINE');

            $insert->insert([

                'session_id'   => $sessionId,
                'ip'           => $ip,
                'country'      => $country,
                'user_id'      => $userId,
                'username'     => $username,
                'user_agent'   => $userAgent,
                'page'         => $page,
                'is_bot'       => $isBot,
                'last_activity'=> $time

            ]);
        }

        // ==========================================
        // STATS JOUR / MOIS / ANNEE
        // ==========================================

        $today = date('Y-m-d');

        $stats = new BDD;
        $stats->table('TABLE_VISITORS_STATS');
        $stats->fields(['id']);

        $stats->where([
            [
                'name'  => 'ip',
                'value' => $ip
            ],
            [
                'name'  => 'date_visit',
                'value' => $today
            ]
        ]);

        $stats->queryOne();

        if (empty($stats->data->id)) {

            $insertStats = new BDD;
            $insertStats->table('TABLE_VISITORS_STATS');

            $insertStats->insert([

                'date_visit'  => $today,
                'month_visit' => date('Y-m'),
                'year_visit'  => date('Y'),
                'ip'          => $ip

            ]);
        }
    }

    /**
     * Détection bot
     */
    private static function isBot(string $userAgent): bool
    {
        if (empty($userAgent)) {
            return true;
        }

        $userAgent = strtolower(trim($userAgent));

        $bots = [
                 'Googlebot'
               , 'Baiduspider'
               , 'ia_archiver'
               , 'R6_FeedFetcher'
               , 'NetcraftSurveyAgent'
               , 'Sogou web spider'
               , 'bingbot'
               , 'Yahoo! Slurp'
               , 'facebookexternalhit'
               , 'PrintfulBot'
               , 'msnbot'
               , 'Twitterbot'
               , 'UnwindFetchor'
               , 'urlresolver'
               , 'Butterfly'
               , 'TweetmemeBot'
               , 'PaperLiBot'
               , 'MJ12bot'
               , 'AhrefsBot'
               , 'Exabot'
               , 'Ezooms'
               , 'YandexBot'
               , 'SearchmetricsBot'
               , 'picsearch'
               , 'TweetedTimes Bot'
               , 'QuerySeekerSpider'
               , 'ShowyouBot'
               , 'woriobot'
               , 'merlinkbot'
               , 'BazQuxBot'
               , 'Kraken'
               , 'SISTRIX Crawler'
               , 'R6_CommentReader'
               , 'magpie-crawler'
               , 'GrapeshotCrawler'
               , 'PercolateCrawler'
               , 'MaxPointCrawler'
               , 'NetSeer crawler'
               , 'grokkit-crawler'
               , 'SMXCrawler'
               , 'PulseCrawler'
               , 'Y!J-BRW'
               , '80legs'
               , 'Mediapartners-Google'
               , 'InAGist'
               , 'Python-urllib'
               , 'NING'
               , 'TencentTraveler'
               , 'Feedfetcher-Google'
               , 'mon.itor.us'
               , 'spbot'
               , 'Feedly'
               , 'bitlybot'
               , 'ADmantX'
               , 'Niki-Bot'
               , 'Pinterest'
               , 'python-requests'
               , 'DotBot'
               , 'HTTP_Request2'
               , 'linkdexbot'
               , 'A6-Indexer'
               , 'TwitterFeed'
               , 'Microsoft Office'
               , 'Pingdom'
               , 'BTWebClient'
               , 'KatBot'
               , 'SiteCheck'
               , 'proximic'
               , 'Sleuth'
               , 'Abonti'
               , '(BOT for JCE)'
               , 'Baidu'
               , 'Tiny Tiny RSS'
               , 'newsblur'
               , 'updown_tester'
               , 'linkdex'
               , 'baidu'
               , 'searchmetrics'
               , 'genieo'
               , 'majestic12'
               , 'spinn3r'
               , 'profound'
               , 'domainappender'
               , 'VegeBot'
               , 'terrykyleseoagency.com'
               , 'CommonCrawler Node'
               , 'AdlesseBot'
               , 'metauri.com'
               , 'libwww-perl'
               , 'rogerbot-crawler'
               , 'ltx71'
               , 'Qwantify'
               , 'Traackr.com'
               , 'Re-Animator Bot'
               , 'Pcore-HTTP'
               , 'BoardReader'
               , 'omgili'
               , 'okhttp'
               , 'CCBot'
               , 'Java/1.8'
               , 'semrush.com'
               , 'feedbot'
               , 'CommonCrawler'
               , 'MetaURI'
               , 'ibwww-perl'
               , 'rogerbot'
               , 'MegaIndex'
               , 'BLEXBot'
               , 'FlipboardProxy'
               , 'techinfo@ubermetrics-technologies.com'
               , 'trendictionbot'
               , 'Mediatoolkitbot'
               , 'trendiction'
               , 'ubermetrics'
               , 'ScooperBot'
               , 'TrendsmapResolver'
               , 'Nuzzel'
               , 'Go-http-client'
               , 'Applebot'
               , 'LivelapBot'
               , 'GroupHigh'
               , 'SemrushBot'
               , 'commoncrawl'
               , 'istellabot'
               , 'DomainCrawler'
               , 'cs.daum.net'
               , 'StormCrawler'
               , 'GarlikCrawler'
               , 'The Knowledge AI'
               , 'getstream.io/winds'
               , 'YisouSpider'
               , 'archive.org_bot'
               , 'semantic-visions.com'
               , 'FemtosearchBot'
               , '360Spider'
               , 'linkfluence.com'
               , 'glutenfreepleasure.com'
               , 'Gluten Free Crawler'
               , 'YaK/1.0'
               , 'Cliqzbot'
               , 'app.hypefactors.com'
               , 'axios'
               , 'webdatastats.com'
               , 'schmorp.de'
               , 'SEOkicks'
               , 'DuckDuckBot'
               , 'Barkrowler'
               , 'ZoominfoBot'
               , 'Linguee Bot'
               , 'Mail.RU_Bot'
               , 'OnalyticaBot'
               , 'admantx-adform'
               , 'Zombiebot'
               , 'Nutch'
               , 'SemanticScholarBot'
               , 'Jetslide'
               , 'scalaj-http'
               , 'XoviBot'
               , 'sysomos.com'
               , 'PocketParser'
               , 'newspaper'
               , 'serpstatbot'
               , 'MetaJobBot'
               , 'SeznamBot/3.2'
               , 'VelenPublicWebCrawler/1.0'
               , 'WordPress.com mShots'
               , 'adscanner'
               , 'BacklinkCrawler'
               , 'netEstate NE Crawler'
               , 'Astute SRM'
               , 'GigablastOpenSource/1.0'
               , 'DomainStatsBot'
               , 'Winds: Open Source RSS & Podcast'
               , 'dlvr.it'
               , 'BehloolBot'
               , '7Siters'
               , 'AwarioSmartBot'
               , 'Apache-HttpClient/5'
               , 'Seekport Crawler'
               , 'AHC/2.1'
               , 'eCairn-Grabber'
               , 'mediawords bot'
               , 'PHP-Curl-Class'
               , 'Scrapy'
               , 'curl/7'
               , 'Blackboard'
               , 'NetNewsWire'
               , 'node-fetch'
               , 'admantx'
               , 'metadataparser'
               , 'Domains Project'
               , 'SerendeputyBot'
               , 'Moreover'
               , 'DuckDuckGo' 
               , 'monitoring-plugins'
               , 'Selfoss'
               , 'Adsbot'
               , 'acebookexternalhit'
               , 'SpiderLing'
               , 'Cocolyzebot'
               , 'TTD-Content'
               , 'superfeedr'
               , 'Twingly'
               , 'Google-Apps-Scrip'
               , 'LinkpadBot'
               , 'CensysInspect'
               , 'Reeder'
               , 'tweetedtimes'
               , 'Amazonbot'
               , 'MauiBot'
               , 'Symfony BrowserKit'
               , 'DataForSeoBot'
               , 'GoogleProducer'
               , 'TinEye-bot-live'
               , 'sindresorhus/got'
               , 'CriteoBot'
               , 'Down/5'
               , 'Yahoo Ad monitoring'
               , 'MetaInspector'
               , 'PetalBot'
               , 'MetadataScraper'
               , 'Cloudflare SpeedTest'
               , 'aiohttp'
               , 'AppEngine-Google'
               , 'heritrix'
               , 'sqlmap'
               , 'Buck'
               , 'wp_is_mobile'
               , '01h4x.com'
               , '404checker'
               , '404enemy'
               , 'AIBOT'
               , 'ALittle Client'
               , 'ASPSeek'
               , 'Aboundex'
               , 'Acunetix'
               , 'AfD-Verbotsverfahren'
               , 'AiHitBot'
               , 'Aipbot'
               , 'Alexibot'
               , 'AllSubmitter'
               , 'Alligator'
               , 'AlphaBot'
               , 'Anarchie'
               , 'Anarchy'
               , 'Anarchy99'
               , 'Ankit'
               , 'Anthill'
               , 'Apexoo'
               , 'Aspiegel'
               , 'Asterias'
               , 'Atomseobot'
               , 'Attach'
               , 'AwarioRssBot'
               , 'BBBike'
               , 'BDCbot'
               , 'BDFetch'
               , 'BackDoorBot'
               , 'BackStreet'
               , 'BackWeb'
               , 'Backlink-Ceck'
               , 'Badass'
               , 'Bandit'
               , 'BatchFTP'
               , 'Battleztar Bazinga'
               , 'BetaBot'
               , 'Bigfoot'
               , 'Bitacle'
               , 'BlackWidow'
               , 'Black Hole'
               , 'Blow'
               , 'BlowFish'
               , 'Boardreader'
               , 'Bolt'
               , 'BotALot'
               , 'Brandprotect'
               , 'Brandwatch'
               , 'Buddy'
               , 'BuiltBotTough'
               , 'BuiltWith'
               , 'Bullseye'
               , 'BunnySlippers'
               , 'BuzzSumo'
               , 'CATExplorador'
               , 'CODE87'
               , 'CSHttp'
               , 'Calculon'
               , 'CazoodleBot'
               , 'Cegbfeieh'
               , 'CheTeam'
               , 'CheeseBot'
               , 'CherryPicker'
               , 'ChinaClaw'
               , 'Chlooe'
               , 'Citoid'
               , 'Claritybot'
               , 'Cloud mapping'
               , 'Cogentbot'
               , 'Collector'
               , 'Copier'
               , 'CopyRightCheck'
               , 'Copyscape'
               , 'Cosmos'
               , 'Craftbot'
               , 'Crawling at Home Project'
               , 'CrazyWebCrawler'
               , 'Crescent'
               , 'CrunchBot'
               , 'Curious'
               , 'Custo'
               , 'CyotekWebCopy'
               , 'DBLBot'
               , 'DIIbot'
               , 'DSearch'
               , 'DTS Agent'
               , 'DataCha0s'
               , 'DatabaseDriverMysqli'
               , 'Demon'
               , 'Deusu'
               , 'Devil'
               , 'Digincore'
               , 'DigitalPebble'
               , 'Dirbuster'
               , 'Disco'
               , 'Discobot'
               , 'Discoverybot'
               , 'Dispatch'
               , 'DittoSpyder'
               , 'DnBCrawler-Analytics'
               , 'DnyzBot'
               , 'DomCopBot'
               , 'DomainAppender'
               , 'DomainSigmaCrawler'
               , 'Dotbot'
               , 'Download Wonder'
               , 'Dragonfly'
               , 'Drip'
               , 'ECCP/1.0'
               , 'EMail Siphon'
               , 'EMail Wolf'
               , 'EasyDL'
               , 'Ebingbong'
               , 'Ecxi'
               , 'EirGrabber'
               , 'EroCrawler'
               , 'Evil'
               , 'Express WebPictures'
               , 'ExtLinksBot'
               , 'Extractor'
               , 'ExtractorPro'
               , 'Extreme Picture Finder'
               , 'EyeNetIE'
               , 'FDM'
               , 'FHscan'
               , 'Fimap'
               , 'Firefox/7.0'
               , 'FlashGet'
               , 'Flunky'
               , 'Foobot'
               , 'Freeuploader'
               , 'FrontPage'
               , 'Fuzz'
               , 'FyberSpider'
               , 'Fyrebot'
               , 'G-i-g-a-b-o-t'
               , 'GT::WWW'
               , 'GalaxyBot'
               , 'Genieo'
               , 'GermCrawler'
               , 'GetRight'
               , 'GetWeb'
               , 'Getintent'
               , 'Gigabot'
               , 'Go!Zilla'
               , 'Go-Ahead-Got-It'
               , 'GoZilla'
               , 'Gotit'
               , 'GrabNet'
               , 'Grabber'
               , 'Grafula'
               , 'GrapeFX'
               , 'GridBot'
               , 'HEADMasterSEO'
               , 'HMView'
               , 'HTMLparser'
               , 'HTTP::Lite'
               , 'HTTrack'
               , 'Haansoft'
               , 'HaosouSpider'
               , 'Harvest'
               , 'Havij'
               , 'Hloader'
               , 'HonoluluBot'
               , 'Humanlinks'
               , 'HybridBot'
               , 'IDBTE4M'
               , 'IDBot'
               , 'IRLbot'
               , 'Iblog'
               , 'Id-search'
               , 'IlseBot'
               , 'Image Fetch'
               , 'Image Sucker'
               , 'IndeedBot'
               , 'Indy Library'
               , 'InfoNaviRobot'
               , 'InfoTekies'
               , 'Intelliseek'
               , 'InterGET'
               , 'InternetSeer'
               , 'Internet Ninja'
               , 'Iria'
               , 'Iskanie'
               , 'IstellaBot'
               , 'JOC Web Spider'
               , 'JamesBOT'
               , 'Jbrofuzz'
               , 'JennyBot'
               , 'JetCar'
               , 'Jetty'
               , 'JikeSpider'
               , 'Joomla'
               , 'Jorgee'
               , 'JustView'
               , 'Jyxobot'
               , 'Kenjin Spider'
               , 'Keybot Translation-Search-Machine'
               , 'Keyword Density'
               , 'Kinza'
               , 'Kozmosbot'
               , 'LNSpiderguy'
               , 'LWP::Simple'
               , 'Lanshanbot'
               , 'Larbin'
               , 'Leap'
               , 'LeechFTP'
               , 'LeechGet'
               , 'LexiBot'
               , 'Lftp'
               , 'LibWeb'
               , 'Libwhisker'
               , 'LieBaoFast'
               , 'Lightspeedsystems'
               , 'Likse'
               , 'LinkScan'
               , 'LinkWalker'
               , 'Linkbot'
               , 'LinkextractorPro'
               , 'LinksManager'
               , 'LinqiaMetadataDownloaderBot'
               , 'LinqiaRSSBot'
               , 'LinqiaScrapeBot'
               , 'Lipperhey'
               , 'Lipperhey Spider'
               , 'Litemage_walker'
               , 'Lmspider'
               , 'MFC_Tear_Sample'
               , 'MIDown tool'
               , 'MIIxpc'
               , 'MQQBrowser'
               , 'MSFrontPage'
               , 'MSIECrawler'
               , 'MTRobot'
               , 'Mag-Net'
               , 'Magnet'
               , 'Majestic-SEO'
               , 'Majestic12'
               , 'Majestic SEO'
               , 'MarkMonitor'
               , 'MarkWatch'
               , 'Mass Downloader'
               , 'Masscan'
               , 'Mata Hari'
               , 'Mb2345Browser'
               , 'MeanPath Bot'
               , 'Meanpathbot'
               , 'Metauri'
               , 'MicroMessenger'
               , 'Microsoft Data Access'
               , 'Microsoft URL Control'
               , 'Minefield'
               , 'Mister PiX'
               , 'Moblie Safari'
               , 'Mojeek'
               , 'Mojolicious'
               , 'MolokaiBot'
               , 'Morfeus Fucking Scanner'
               , 'Mozlila'
               , 'Mr.4x3'
               , 'Msrabot'
               , 'Musobot'
               , 'NICErsPRO'
               , 'NPbot'
               , 'Name Intelligence'
               , 'Nameprotect'
               , 'Navroad'
               , 'NearSite'
               , 'Needle'
               , 'Nessus'
               , 'NetAnts'
               , 'NetLyzer'
               , 'NetMechanic'
               , 'NetSpider'
               , 'NetZIP'
               , 'Net Vampire'
               , 'Netcraft'
               , 'Nettrack'
               , 'Netvibes'
               , 'NextGenSearchBot'
               , 'Nibbler'
               , 'Niki-bot'
               , 'Nikto'
               , 'NimbleCrawler'
               , 'Nimbostratus'
               , 'Ninja'
               , 'Nmap'
               , 'Not'
               , 'Nuclei'
               , 'Octopus'
               , 'Offline Explorer'
               , 'Offline Navigator'
               , 'OnCrawl'
               , 'OpenLinkProfiler'
               , 'OpenVAS'
               , 'Openfind'
               , 'Openvas'
               , 'OrangeBot'
               , 'OrangeSpider'
               , 'OutclicksBot'
               , 'OutfoxBot'
               , 'PECL::HTTP'
               , 'PHPCrawl'
               , 'POE-Component-Client-HTTP'
               , 'PageAnalyzer'
               , 'PageGrabber'
               , 'PageScorer'
               , 'PageThing.com'
               , 'Page Analyzer'
               , 'Pandalytics'
               , 'Panscient'
               , 'Papa Foto'
               , 'Pavuk'
               , 'PeoplePal'
               , 'Petalbot'
               , 'Pi-Monster'
               , 'Picscout'
               , 'Picsearch'
               , 'PictureFinder'
               , 'Piepmatz'
               , 'Pimonster'
               , 'Pixray'
               , 'PleaseCrawl'
               , 'Pockey'
               , 'ProPowerBot'
               , 'ProWebWalker'
               , 'Probethenet'
               , 'Psbot'
               , 'Pu_iN'
               , 'Pump'
               , 'PxBroker'
               , 'PyCurl'
               , 'QueryN Metasearch'
               , 'Quick-Crawler'
               , 'RSSingBot'
               , 'RankActive'
               , 'RankActiveLinkBot'
               , 'RankFlex'
               , 'RankingBot'
               , 'RankingBot2'
               , 'Rankivabot'
               , 'RankurBot'
               , 'Re-re'
               , 'ReGet'
               , 'RealDownload'
               , 'Reaper'
               , 'RebelMouse'
               , 'Recorder'
               , 'RedesScrapy'
               , 'RepoMonkey'
               , 'Ripper'
               , 'RocketCrawler'
               , 'Rogerbot'
               , 'SBIder'
               , 'SEOlyticsCrawler'
               , 'SEOprofiler'
               , 'SEOstats'
               , 'SISTRIX'
               , 'SMTBot'
               , 'SalesIntelligent'
               , 'ScanAlert'
               , 'Scanbot'
               , 'ScoutJet'
               , 'Screaming'
               , 'ScreenerBot'
               , 'ScrepyBot'
               , 'Searchestate'
               , 'Seekport'
               , 'SemanticJuice'
               , 'Semrush'
               , 'SentiBot'
               , 'SeoSiteCheckup'
               , 'SeobilityBot'
               , 'Seomoz'
               , 'Shodan'
               , 'Siphon'
               , 'SiteCheckerBotCrawler'
               , 'SiteExplorer'
               , 'SiteLockSpider'
               , 'SiteSnagger'
               , 'SiteSucker'
               , 'Site Sucker'
               , 'Sitebeam'
               , 'Siteimprove'
               , 'Sitevigil'
               , 'SlySearch'
               , 'SmartDownload'
               , 'Snake'
               , 'Snapbot'
               , 'Snoopy'
               , 'SocialRankIOBot'
               , 'Sociscraper'
               , 'Sosospider'
               , 'Sottopop'
               , 'SpaceBison'
               , 'Spammen'
               , 'SpankBot'
               , 'Spanner'
               , 'Spbot'
               , 'SputnikBot'
               , 'Sqlmap'
               , 'Sqlworm'
               , 'Sqworm'
               , 'Steeler'
               , 'Stripper'
               , 'Sucker'
               , 'Sucuri'
               , 'SuperBot'
               , 'SuperHTTP'
               , 'Surfbot'
               , 'SurveyBot'
               , 'Suzuran'
               , 'Swiftbot'
               , 'Szukacz'
               , 'T0PHackTeam'
               , 'T8Abot'
               , 'Teleport'
               , 'TeleportPro'
               , 'Telesoft'
               , 'Telesphoreo'
               , 'Telesphorep'
               , 'TheNomad'
               , 'The Intraformant'
               , 'Thumbor'
               , 'TightTwatBot'
               , 'Titan'
               , 'Toata'
               , 'Toweyabot'
               , 'Tracemyfile'
               , 'Trendiction'
               , 'Trendictionbot'
               , 'True_Robot'
               , 'Turingos'
               , 'Turnitin'
               , 'TurnitinBot'
               , 'TwengaBot'
               , 'Twice'
               , 'Typhoeus'
               , 'URLy.Warning'
               , 'URLy Warning'
               , 'UnisterBot'
               , 'Upflow'
               , 'V-BOT'
               , 'VB Project'
               , 'VCI'
               , 'Vacuum'
               , 'Vagabondo'
               , 'VelenPublicWebCrawler'
               , 'VeriCiteCrawler'
               , 'VidibleScraper'
               , 'Virusdie'
               , 'VoidEYE'
               , 'Voil'
               , 'Voltron'
               , 'WASALive-Bot'
               , 'WBSearchBot'
               , 'WEBDAV'
               , 'WISENutbot'
               , 'WPScan'
               , 'WWW-Collector-E'
               , 'WWW-Mechanize'
               , 'WWW::Mechanize'
               , 'WWWOFFLE'
               , 'Wallpapers'
               , 'Wallpapers/3.0'
               , 'WallpapersHD'
               , 'WeSEE'
               , 'WebAuto'
               , 'WebBandit'
               , 'WebCollage'
               , 'WebCopier'
               , 'WebEnhancer'
               , 'WebFetch'
               , 'WebFuck'
               , 'WebGo IS'
               , 'WebImageCollector'
               , 'WebLeacher'
               , 'WebPix'
               , 'WebReaper'
               , 'WebSauger'
               , 'WebStripper'
               , 'WebSucker'
               , 'WebWhacker'
               , 'WebZIP'
               , 'Web Auto'
               , 'Web Collage'
               , 'Web Enhancer'
               , 'Web Fetch'
               , 'Web Fuck'
               , 'Web Pix'
               , 'Web Sauger'
               , 'Web Sucker'
               , 'Webalta'
               , 'WebmasterWorldForumBot'
               , 'Webshag'
               , 'WebsiteExtractor'
               , 'WebsiteQuester'
               , 'Website Quester'
               , 'Webster'
               , 'Whack'
               , 'Whacker'
               , 'Whatweb'
               , 'Who.is Bot'
               , 'Widow'
               , 'WinHTTrack'
               , 'WiseGuys Robot'
               , 'Wonderbot'
               , 'Woobot'
               , 'Wotbox'
               , 'Wprecon'
               , 'Xaldon WebSpider'
               , 'Xaldon_WebSpider'
               , 'Xenu'
               , 'YoudaoBot'
               , 'Zade'
               , 'Zauba'
               , 'Zermelo'
               , 'Zeus'
               , 'Zitebot'
               , 'ZmEu'
               , 'ZoomBot'
               , 'ZumBot'
               , 'ZyBorg'
               , 'arquivo-web-crawler'
               , 'arquivo.pt'
               , 'autoemailspider'
               , 'backlink-check'
               , 'cah.io.community'
               , 'check1.exe'
               , 'clark-crawler'
               , 'coccocbot'
               , 'cognitiveseo'
               , 'com.plumanalytics'
               , 'crawl.sogou.com'
               , 'crawler.feedback'
               , 'crawler4j'
               , 'dataforseo.com'
               , 'demandbase-bot'
               , 'domainsproject.org'
               , 'eCatch'
               , 'evc-batch'
               , 'facebookscraper'
               , 'gopher'
               , 'instabid'
               , 'internetVista monitor'
               , 'ips-agent'
               , 'isitwp.com'
               , 'iubenda-radar'
               , 'lwp-request'
               , 'lwp-trivial'
               , 'meanpathbot'
               , 'mediawords'
               , 'muhstik-scan'
               , 'oBot'
               , 'page scorer'
               , 'pcBrowser'
               , 'plumanalytics'
               , 'polaris version'
               , 'probe-image-size'
               , 'ripz'
               , 's1z.ru'
               , 'satoristudio.net'
               , 'scan.lol'
               , 'seobility'
               , 'seocompany.store'
               , 'seoscanners'
               , 'seostar'
               , 'sexsearcher'
               , 'sitechecker.pro'
               , 'siteripz'
               , 'sogouspider'
               , 'sp_auditbot'
               , 'spyfu'
               , 'sysscan'
               , 'tAkeOut'
               , 'trendiction.com'
               , 'trendiction.de'
               , 'ubermetrics-technologies.com'
               , 'voyagerx.com'
               , 'webgains-bot'
               , 'webmeup-crawler'
               , 'webpros.com'
               , 'webprosbot'
               , 'x09Mozilla'
               , 'x22Mozilla'
               , 'xpymep1.exe'
               , 'zauba.io'
               , 'zgrab'
               , 'petalsearch'
               , 'protopage'
               , 'Miniflux'
               , 'Feeder'
               , 'Semanticbot' 
               , 'ImageFetcher'
               , 'Mastodon' 
               , 'Neevabot'
               , 'Pleroma'
               , 'Akkoma'
               , 'koyu.space'
               , 'Embedly'
               , 'Mjukisbyxor'
               , 'Giant Rhubarb'
               , 'GozleBot'
               , 'Friendica'
               , 'WhatsApp'
               , 'XenForo'
               , 'Yeti'
               , 'MuckRack'
               , 'PhxBot'
               , 'Bytespider'
               , 'GPTBot'
               , 'SummalyBot'
               , 'LinkedInBot'
               , 'SpiderWeb'
               , 'SpaceCowboys'
               , 'LCC'
               , 'Paqlebot'
        ];

        foreach ($bots as $bot) {

            if (strpos($userAgent, $bot) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Pays IP
     */
    private static function getCountryCode(string $ip): string
    {
        if ($ip == '127.0.0.1' OR $ip == '::1') {
            return 'BE';
        }

        $json = @file_get_contents(
            'http://ip-api.com/json/'.$ip.'?fields=countryCode'
        );

        if ($json !== false) {

            $data = json_decode($json, true);

            if (!empty($data['countryCode'])) {
                return strtoupper($data['countryCode']);
            }
        }

        return 'UN';
    }

    /**
     * Visiteurs online
     */
    public static function getVisitors(): int
    {
        $sql = new BDD;

        $sql->table('TABLE_VISITORS_ONLINE');

        $sql->where([
            [
                'name'  => 'is_bot',
                'value' => 0
            ]
        ]);

        $sql->count();

        return (int) $sql->data;
    }

    /**
     * Bots online
     */
    public static function getBots(): int
    {
        $sql = new BDD;
        $sql->table('TABLE_VISITORS_ONLINE');

        $sql->where([
            'name'  => 'is_bot',
            'value' => 1
        ]);

        $sql->count();

        return (int) $sql->data;
    }

    /**
     * Membres online
     */
    public static function getMembers(): int
    {
        $sql = new BDD;
        $sql->table('TABLE_VISITORS_ONLINE');

        $sql->where([
            'name'  => 'user_id',
            'op'    => '>',
            'value' => 0
        ]);

        $sql->count();

        return (int) $sql->data;
    }

    /**
     * Visiteurs du jour
     */
    public static function getVisitorsToday(): int
    {
        $sql = new BDD;
        $sql->table('TABLE_VISITORS_STATS');

        $sql->where([
            'name'  => 'date_visit',
            'value' => date('Y-m-d')
        ]);

        $sql->count();

        return (int) $sql->data;
    }

    /**
     * Visiteurs du mois
     */
    public static function getVisitorsMonth(): int
    {
        $sql = new BDD;
        $sql->table('TABLE_VISITORS_STATS');

        $sql->where([
            'name'  => 'month_visit',
            'value' => date('Y-m')
        ]);

        $sql->count();

        return (int) $sql->data;
    }

    /**
     * Visiteurs année
     */
    public static function getVisitorsYear(): int
    {
        $sql = new BDD;
        $sql->table('TABLE_VISITORS_STATS');

        $sql->where([
            'name'  => 'year_visit',
            'value' => date('Y')
        ]);

        $sql->count();

        return (int) $sql->data;
    }

    /**
     * Liste online
     */
    public static function getOnlineList(): array
    {
        $sql = new BDD;

        $sql->table('TABLE_VISITORS_ONLINE');

        $sql->orderby([
            [
                'name' => 'user_id',
                'type' => 'DESC'
            ]
        ]);

        $sql->isObject(false);

        $sql->queryAll();

        return $sql->data;
    }

    private static function isIgnoredPage(string $page): bool
    {
        $extensions = [
            'articles',
            'buyPlan',
            'calendar',
            'comments',
            'contact',
            'downloads',
            'forum',
            'gallery',
            'guestbook',
            'inbox',
            'links',
            'members',
            'news',
            'newsletter',
            'shoutbox',
            'typoghrapy',
            'user',
            'teams',
            'support',
        ];
        $ext = strtolower($page);
        if (in_array($ext, $extensions)) {
            return true;
        }
        return false;
    }
    public static function dataVisitors(): array
    {
        $stats = array(
            'visitors'       => self::getVisitors(),
            'visitorsToday'  => self::getVisitorsToday(),
            'visitorsMonth'  => self::getVisitorsMonth(),
            'visitorsYear'   => self::getVisitorsYear(),
            'visitorsBots'   => self::getBots(),
            'visitorMembers' => self::getMembers(),
            'users'          => self::getOnlineList()
        );
        return $stats;
    }
}