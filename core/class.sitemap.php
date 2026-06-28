<?php

namespace BelCMS\Core;

use BelCMS\PDO\BDD;

class Sitemap
{
    private string $baseUrl = 'https://www.bel-cms.dev';

    public function generate(): void
    {
        header('Content-Type: application/xml; charset=utf-8');

        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startDocument('1.0', 'UTF-8');

        $xml->startElement('urlset');
        $xml->writeAttribute(
            'xmlns',
            'https://www.sitemaps.org/schemas/sitemap/0.9'
        );

        // Homepage
        $this->addUrl(
            $xml,
            $this->baseUrl,
            date('Y-m-d'),
            'daily',
            '1.0'
        );

        // News
        $this->news($xml);

        // Pages
        $this->pages($xml);

        $xml->endElement();
        echo $xml->outputMemory();
        exit;
    }

    private function news(\XMLWriter $xml): void
    {
        $sql = "
            SELECT id, title, date_create
            FROM news
            WHERE published = 1
        ";

        $query = BDD::Connect()->prepare($sql);
        $query->execute();

        while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {

            $slug = $this->slug($row['title']);

            $this->addUrl(
                $xml,
                $this->baseUrl . '/news/' . $slug,
                date('Y-m-d', strtotime($row['date_create'])),
                'weekly',
                '0.8'
            );
        }
    }

    private function pages(\XMLWriter $xml): void
    {
        $sql = "
            SELECT permalink, updated_at
            FROM pages
            WHERE active = 1
        ";

        $query = BDD::Connect()->prepare($sql);
        $query->execute();

        while ($row = $query->fetch(\PDO::FETCH_ASSOC)) {

            $this->addUrl(
                $xml,
                $this->baseUrl . '/' . trim($row['permalink'], '/'),
                date('Y-m-d', strtotime($row['updated_at'])),
                'monthly',
                '0.7'
            );
        }
    }

    private function addUrl(
        \XMLWriter $xml,
        string $loc,
        string $lastmod,
        string $changefreq,
        string $priority
    ): void {

        $xml->startElement('url');

        $xml->writeElement('loc', $loc);
        $xml->writeElement('lastmod', $lastmod);
        $xml->writeElement('changefreq', $changefreq);
        $xml->writeElement('priority', $priority);

        $xml->endElement();
    }

    private function slug(string $text): string
    {
        $text = strtolower($text);

        $text = preg_replace('/[^a-z0-9]+/i', '-', $text);

        return trim($text, '-');
    }
}