# urlcleaner

Removes unwanted parts of the url like "items" or "events"

## Funktionsweise

Viele Leser in Contao, etwas der Nachrichtenleser oder der Eventleser, erhalten den gewünschten Eintrag als URL-Parameter. Diesem ist jedoch beispielsweise ein "/items/" oder "/events/" in der URL vorangestellt. Aus Anwendersicht und für Suchmaschinenoptimierung ist dieser Teil der URL unerwünscht. Die Erweiterung urlcleaner bietet die Möglichkeit die URLs von solchen unerwünschten Fragmenten zu reinigen.

Die Umschreibung passiert in zwei Richtungen: Zum einen werden bei Links auf derartige URLs die unnötigen Teile aus der URL entfernt. Zum anderen werden beim Aufruf entsprechender URLs die entfernten Elemente im Hintergrund automatisch aber unsichtbar ergänzt.


## Anwendung

Nach der Installation muss pro zu bereinigender URL ein Eintrag in die **localconfig.php** ergänzt werden.

**WICHTIG: Am Ende der Einträge darf KEIN Slash stehen!**

**WICHTIG: Der Konfigurationscode muss nach ### INSTALL SCRIPT STOP ### eingefügt werden.**

```sh
$GLOBALS['TL_CONFIG']['arrUrlFragments'] = array(
  'news-reader' => 'items',
);
```

In diesem Beispiel werden URLs der Form /news-reader/items/alias auf /news-reader/alias umgeschrieben. Sollen mehrere URLs umgeschrieben werden, so können mehrere Zeilen eingetragen werden. Beispiel:

```sh
$GLOBALS['TL_CONFIG']['arrUrlFragments'] = array(
  'news-reader' => 'items',
  'event-reader' => 'events',
);
```

Die Umschreibung kann auch über mehrere Ebenen vorgenommen werden. Liegt beispielsweise der Leser für Blogeinträge unter /weblog/reader/ und die URL würde lauten /weblog/reader/items/alias kann diese wie folgt umgeschrieben werden:

```sh
$GLOBALS['TL_CONFIG']['arrUrlFragments'] = array(
        'weblog' => 'reader/items',
);
```


## Wichtig

Beim Expandieren der URLs wird geprüft, ob es ggf. eine Seite mit einem passenden Alias gibt. In diesem Fall wird die URL nicht expandiert.

Aus dem letzten Beispiel oben:
/blog/foobar ist eine Seite (Installation von folderurl vorausgesetzt)
/blog/reader/items/foobar wäre die normale URL der Nachricht

Beim Verlinken auf die Nachricht wird aus dem Link /blog/reader/items/foobar wie gewünscht. /blog/foobar. Beim Aufruf von dieser URL wird jedoch die Seite und nicht die Nachricht angezeigt.
**Es ist also darauf zu achten, dass die Aliase der Elemente nicht denen anderer (Unter)Seiten entsprechen.**


## Vermeidung von Duplicate Content

Bei der Nutzung von urlcleaner werden zwar alle Links innerhalb von Contao zwar vollständig ersetzt. Dennoch bleiben die Inhalte weiterhin unter der normalen URL abrufbar. Dies stellt sogenannten Duplicate Content, also gleiche Inhalte unter zwei verschiedenen URLs, dar und wirkt sich negativ auf das Ranking in Suchmaschinen aus.

Daher empfiehlt es sich, die normalen URLs über einen Eintrag in der .htaccess jeweils auf die neue verkürzte Schreibweise weiterzuleiten. Dies geht beispielsweise mit folgenden Regeln:

`RedirectMatch 301 ^(.*)/newsreader/items/(.*) $1/newsreader/$2`
`RedirectMatch 301 ^(.*)/eventreader/events/(.*) $1/eventreader/$2`

Werden alle Stellen im System, die beispielsweise "items" als Parameter verwenden, weitergeleitet, können diese auch mit einer einzigen Rewrite-Regel weitergeleitet werden:

`RedirectMatch 301 ^(.*)/items/(.*) $1/$2`


License: http://www.gnu.org/licenses/lgpl-3.0.html LGPL <br>
Author: [christianbarkowsky](http://www.christianbarkowsky.de)
