<?php

use PHPUnit\Framework\TestCase;

class PageTest extends TestCase
{
    protected function loadHtml($filename)
    {
        $path = __DIR__ . '/../public/' . $filename;
        $this->assertFileExists($path, "$filename not found");
        return file_get_contents($path);
    }

    public function testIndexPageLoads()
    {
        $html = $this->loadHtml('index.html');

        $this->assertStringContainsString('<h1>Task Manager</h1>', $html);
        $this->assertStringContainsString('<a href="about.html">About</a>', $html);
    }

    public function testAboutPageLoads()
    {
        $html = $this->loadHtml('about.html');

        $this->assertStringContainsString('<h1>About This App</h1>', $html);
        $this->assertStringContainsString('<a href="index.html">Home</a>', $html);
    }
}