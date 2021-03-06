<?php


namespace snippets\code_generator;


class HTTPStatuscodes
{
  public function __construct()
  {

    // Quelle : https://de.wikipedia.org/wiki/HTTP-Statuscode
    // input
    $str = <<<TXT
Code	Nachricht	Bedeutung
100	Continue	Die laufende Anfrage an den Server wurde noch nicht zurückgewiesen. (Wird im Zusammenhang mit dem „Expect 100-continue“-Header-Feld verwendet.) Der Client kann nun mit der potentiell sehr großen Anfrage fortfahren.
101	Switching Protocols	Wird verwendet, wenn der Server eine Anfrage mit gesetztem „Upgrade“-Header-Feld empfangen hat und mit dem Wechsel zu einem anderen Protokoll einverstanden ist. Anwendung findet dieser Status-Code beispielsweise im Wechsel von HTTP zu WebSocket.
102	Processing	Wird verwendet, um ein Timeout zu vermeiden, während der Server eine zeitintensive Anfrage bearbeitet. Dies ist eine Interim-Antwort, auf welche auf derselben Verbindung ohne weitere Client-Anfrage eine endgültige Antwort folgen muss.
103	Early Hints	Wird zusammen mit dem "Link" Header verwendet, um das Vorladen von Ressourcen zu ermöglichen, während der Server die finale Antwort noch vorbereitet.
2xx – Erfolgreiche Operation
Die Anfrage war erfolgreich, die Antwort kann verwertet werden.

Code	Nachricht	Bedeutung
200	OK	Die Anfrage wurde erfolgreich bearbeitet und das Ergebnis der Anfrage wird in der Antwort übertragen.
201	Created	Die Anfrage wurde erfolgreich bearbeitet. Die angeforderte Ressource wurde vor dem Senden der Antwort erstellt. Das „Location“-Header-Feld enthält eventuell die Adresse der erstellten Ressource.
202	Accepted	Die Anfrage wurde akzeptiert, wird aber zu einem späteren Zeitpunkt ausgeführt. Das Gelingen der Anfrage kann nicht garantiert werden.
203	Non-Authoritative Information	Der Server agiert als „Transforming Proxy“, erhielt eine 200 OK Antwort von der Quelle und antwortet mit einem veränderten Dokument der Quelle.
204	No Content	Die Anfrage wurde erfolgreich durchgeführt, die Antwort enthält jedoch bewusst keine Daten.
205	Reset Content	Die Anfrage wurde erfolgreich durchgeführt; der Client soll das Dokument neu aufbauen und Formulareingaben zurücksetzen.
206	Partial Content	Der angeforderte Teil wurde erfolgreich übertragen (wird im Zusammenhang mit einem „Content-Range“-Header-Feld oder dem Content-Type multipart/byteranges verwendet). Kann einen Client über Teil-Downloads informieren (wird zum Beispiel von Wget genutzt, um den Downloadfortschritt zu überwachen oder einen Download in mehrere Streams aufzuteilen).
207	Multi-Status	Die Antwort enthält ein XML-Dokument, das mehrere Statuscodes zu unabhängig voneinander durchgeführten Operationen enthält.
208	Already Reported	WebDAV RFC 5842 – Die Mitglieder einer WebDAV-Bindung wurden bereits zuvor aufgezählt und sind in dieser Anfrage nicht mehr vorhanden.
226	IM Used	RFC 3229 – Der Server hat eine GET-Anforderung für die Ressource erfüllt, die Antwort ist eine Darstellung des Ergebnisses von einer oder mehrerer Instanz-Manipulationen, bezogen auf die aktuelle Instanz.
3xx – Umleitung
Um eine erfolgreiche Bearbeitung der Anfrage sicherzustellen, sind weitere Schritte seitens des Clients erforderlich.

Code	Nachricht	Bedeutung
300	Multiple Choices	Die angeforderte Ressource steht in verschiedenen Arten zur Verfügung. Die Antwort enthält eine Liste der verfügbaren Arten. Das „Location“-Header-Feld enthält eventuell die Adresse der vom Server bevorzugten Repräsentation.
301	Moved Permanently	Die angeforderte Ressource steht ab sofort unter der im „Location“-Header-Feld angegebenen Adresse bereit (auch Redirect genannt). Die alte Adresse ist nicht länger gültig.
302	Found (Moved Temporarily)	Die angeforderte Ressource steht vorübergehend unter der im „Location“-Header-Feld angegebenen Adresse bereit. Die alte Adresse bleibt gültig. Die Browser folgen meist mit einem GET, auch wenn der ursprüngliche Request ein POST war. Wird in HTTP/1.1 je nach Anwendungsfall durch die Statuscodes 303 oder 307 ersetzt. 302-Weiterleitung ist aufgrund eines Suchmaschinen-Fehlers, des URL-Hijackings, in Kritik geraten.
303	See Other	Die Antwort auf die durchgeführte Anfrage lässt sich unter der im „Location“-Header-Feld angegebenen Adresse beziehen. Der Browser soll mit einem GET folgen, auch wenn der ursprüngliche Request ein POST war.
304	Not Modified	Der Inhalt der angeforderten Ressource hat sich seit der letzten Abfrage des Clients nicht verändert und wird deshalb nicht übertragen. Zu den Einzelheiten siehe Browser-Cache-Versionsvergleich.
305	Use Proxy	Die angeforderte Ressource ist nur über einen Proxy erreichbar. Das „Location“-Header-Feld enthält die Adresse des Proxys.
306	(reserviert)	306 wird nicht mehr verwendet, ist aber reserviert. Es wurde für „Switch Proxy“ verwendet.
307	Temporary Redirect	Die angeforderte Ressource steht vorübergehend unter der im „Location“-Header-Feld angegebenen Adresse bereit. Die alte Adresse bleibt gültig. Der Browser soll mit derselben Methode folgen wie beim ursprünglichen Request (d. h. einem POST folgt ein POST). Dies ist der wesentliche Unterschied zu 302/303.
308	Permanent Redirect	Die angeforderte Ressource steht ab sofort unter der im „Location“-Header-Feld angegebenen Adresse bereit, die alte Adresse ist nicht länger gültig. Der Browser soll mit derselben Methode folgen wie beim ursprünglichen Request (d. h. einem POST folgt ein POST). Dies ist der wesentliche Unterschied zu 301.
4xx – Client-Fehler
Die Ursache des Scheiterns der Anfrage liegt (eher) im Verantwortungsbereich des Clients.

Code	Nachricht	Bedeutung
400	Bad Request	Die Anfrage-Nachricht war fehlerhaft aufgebaut.
401	Unauthorized	Die Anfrage kann nicht ohne gültige Authentifizierung durchgeführt werden. Wie die Authentifizierung durchgeführt werden soll, wird im „WWW-Authenticate“-Header-Feld der Antwort übermittelt.
402	Payment Required	Übersetzt: Bezahlung benötigt. Dieser Status ist für zukünftige HTTP-Protokolle reserviert.
403	Forbidden	Die Anfrage wurde mangels Berechtigung des Clients nicht durchgeführt, bspw. weil der authentifizierte Benutzer nicht berechtigt ist, oder eine als HTTPS konfigurierte URL nur mit HTTP aufgerufen wurde.
404	Not Found	Die angeforderte Ressource wurde nicht gefunden. Dieser Statuscode kann ebenfalls verwendet werden, um eine Anfrage ohne näheren Grund abzuweisen. Links, welche auf solche Fehlerseiten verweisen, werden auch als Tote Links bezeichnet.
405	Method Not Allowed	Die Anfrage darf nur mit anderen HTTP-Methoden (zum Beispiel GET statt POST) gestellt werden. Gültige Methoden für die betreffende Ressource werden im „Allow“-Header-Feld der Antwort übermittelt.
406	Not Acceptable	Die angeforderte Ressource steht nicht in der gewünschten Form zur Verfügung. Gültige „Content-Type“-Werte können in der Antwort übermittelt werden.
407	Proxy Authentication Required	Analog zum Statuscode 401 ist hier zunächst eine Authentifizierung des Clients gegenüber dem verwendeten Proxy erforderlich. Wie die Authentifizierung durchgeführt werden soll, wird im „Proxy-Authenticate“-Header-Feld der Antwort übermittelt.
408	Request Timeout	Innerhalb der vom Server erlaubten Zeitspanne wurde keine vollständige Anfrage des Clients empfangen.
409	Conflict	Die Anfrage wurde unter falschen Annahmen gestellt. Im Falle einer PUT-Anfrage kann dies zum Beispiel auf eine zwischenzeitliche Veränderung der Ressource durch Dritte zurückgehen.
410	Gone	Die angeforderte Ressource wird nicht länger bereitgestellt und wurde dauerhaft entfernt.
411	Length Required	Die Anfrage kann ohne ein „Content-Length“-Header-Feld nicht bearbeitet werden.
412	Precondition Failed	Eine in der Anfrage übertragene Voraussetzung, zum Beispiel in Form eines „If-Match“-Header-Felds, traf nicht zu.
413	Payload Too Large	Die gestellte Anfrage war zu groß, um vom Server bearbeitet werden zu können. Ein „Retry-After“-Header-Feld in der Antwort kann den Client darauf hinweisen, dass die Anfrage eventuell zu einem späteren Zeitpunkt bearbeitet werden könnte.
414	URI Too Long	Die URL der Anfrage war zu lang. Ursache ist oft eine Endlosschleife aus Redirects.
415	Unsupported Media Type	Der Inhalt der Anfrage wurde mit ungültigem oder nicht erlaubtem Medientyp übermittelt.
416	Range Not Satisfiable	Der angeforderte Teil einer Ressource war ungültig oder steht auf dem Server nicht zur Verfügung.
417	Expectation Failed	Verwendet im Zusammenhang mit einem „Expect“-Header-Feld. Das im „Expect“-Header-Feld geforderte Verhalten des Servers kann nicht erfüllt werden.
421	Misdirected Request	Die Anfrage wurde an einen Server gesendet, der nicht in der Lage ist, eine Antwort zu senden. Eingeführt in HTTP/2.
422	Unprocessable Entity	Verwendet, wenn weder die Rückgabe von Statuscode 415 noch 400 gerechtfertigt wäre, eine Verarbeitung der Anfrage jedoch zum Beispiel wegen semantischer Fehler abgelehnt wird.
423	Locked	Die angeforderte Ressource ist zur Zeit gesperrt.
424	Failed Dependency	Die Anfrage konnte nicht durchgeführt werden, weil sie das Gelingen einer anderen Anfrage voraussetzt.
425	Too Early	Der Server bittet den Client die Anfrage erneut zu senden, da die TLS-Verbindung noch nicht vollständig hergestellt wurde. Dies soll einen Replay-Angriff verhindern.
426	Upgrade Required	Der Server verlangt vom Client, dass er die Anfrage mit einem anderen Protokoll wiederholt. Ein Anwendungsfall ist das Umschalten auf HTTP mit Transport Layer Security.
428	Precondition Required	Für die Anfrage waren nicht alle Vorbedingungen erfüllt. Dieser Statuscode soll Probleme durch Race Conditions verhindern, indem eine Manipulation oder Löschen nur erfolgt, wenn der Client dies auf Basis einer aktuellen Ressource anfordert (Beispielsweise durch Mitliefern eines aktuellen ETag-Header).
429	Too Many Requests	Der Client hat zu viele Anfragen in einem bestimmten Zeitraum gesendet.
431	Request Header Fields Too Large	Die Maximallänge eines Headerfelds oder des Gesamtheaders wurde überschritten.
451	Unavailable For Legal Reasons	Dieser Statuscode soll darauf hinweisen, dass die angeforderte Ressource aufgrund von gesetzlichen Bestimmungen (Copyrighteinschränkungen, Zensur etc., eventuell beschränkt auf ein bestimmtes Land) nicht verfügbar ist.
Er wurde im Juni 2012 von Google-Mitarbeiter Tim Bray bei der IETF eingereicht und gilt seit dem 17. Dezember 2015 als angenommen. Bray schlug die Nummer 451 in Anspielung auf Ray Bradburys Roman Fahrenheit 451 vor und fügte einen Dank an den Autor an.

Beispiele für weitere, per Juli 2020 nicht in der Hypertext Transfer Protocol (HTTP) Status Code Registry aufgeführte Codes:
418	I’m a teapot	Dieser Code ist als Aprilscherz der IETF zu verstehen. Innerhalb eines scherzhaften Protokolls zum Kaffeekochen, des Hyper Text Coffee Pot Control Protocols, zeigt er an, dass fälschlicherweise eine Teekanne anstatt einer Kaffeekanne verwendet wurde. Dieser Scherz-Statuscode ist auf einigen Webseiten zu finden, obwohl er weder Bestandteil von HTTP ist noch in der Status Code Registry definiert ist. Er soll zukünftig als „reserviert“ gelistet werden.
420	Policy Not Fulfilled	In W3C PEP (Working Draft 21. November 1997) wird dieser Code vorgeschlagen, um mitzuteilen, dass eine Bedingung nicht erfüllt wurde.
444	No Response	In nginx-Logs verwendet, um anzuzeigen, dass der Server keine Informationen zum Client zurückgesendet und die Verbindung geschlossen hat.
449	The request should be retried after doing the appropriate action	Genutzt in Antworten des Microsoft Exchange Servers.
499	Client Closed Request	Ein nicht standardmäßiger Statuscode, der von nginx für den Fall eingeführt wurde, dass ein Client die Verbindung schließt, während nginx die Anforderung verarbeitet.
5xx – Server-Fehler
Nicht klar von den so genannten Client-Fehlern abzugrenzen. Die Ursache des Scheiterns der Anfrage liegt jedoch eher im Verantwortungsbereich des Servers.

Code	Nachricht	Bedeutung
500	Internal Server Error	Dies ist ein „Sammel-Statuscode“ für unerwartete Serverfehler.
501	Not Implemented	Die Funktionalität, um die Anfrage zu bearbeiten, wird von diesem Server nicht bereitgestellt. Ursache ist zum Beispiel eine unbekannte oder nicht unterstützte HTTP-Methode.
502	Bad Gateway	Der Server konnte seine Funktion als Gateway oder Proxy nicht erfüllen, weil er seinerseits eine ungültige Antwort erhalten hat.
503	Service Unavailable	Der Server steht temporär nicht zur Verfügung, zum Beispiel wegen Überlastung oder Wartungsarbeiten. Ein „Retry-After“-Header-Feld in der Antwort kann den Client auf einen Zeitpunkt hinweisen, zu dem die Anfrage eventuell bearbeitet werden könnte.
504	Gateway Timeout	Der Server konnte seine Funktion als Gateway oder Proxy nicht erfüllen, weil er innerhalb einer festgelegten Zeitspanne keine Antwort von seinerseits benutzten Servern oder Diensten erhalten hat.
505	HTTP Version not supported	Die benutzte HTTP-Version (gemeint ist die Zahl vor dem Punkt) wird vom Server nicht unterstützt oder abgelehnt.
506	Variant Also Negotiates	Die Inhaltsvereinbarung der Anfrage ergibt einen Zirkelbezug.
507	Insufficient Storage	Die Anfrage konnte nicht bearbeitet werden, weil der Speicherplatz des Servers dazu derzeit nicht mehr ausreicht.
508	Loop Detected	Die Operation wurde nicht ausgeführt, weil die Ausführung in eine Endlosschleife gelaufen wäre. Definiert in der Binding-Erweiterung für WebDAV gemäß RFC 5842, weil durch Bindings zyklische Pfade zu WebDAV-Ressourcen entstehen können.
509	Bandwidth Limit Exceeded	Die Anfrage wurde verworfen, weil sonst die verfügbare Bandbreite überschritten würde (inoffizielle Erweiterung einiger Server).
510	Not Extended	Die Anfrage enthält nicht alle Informationen, die die angefragte Server-Extension zwingend erwartet.
511	Network Authentication Required	Der Client muss sich zuerst authentifizieren, um Zugang zum Netzwerk zu erhalten.
TXT;

    //
    $re  = '/(([0-9]{3})\s(.+)\t{1,}(.+))/m';
    preg_match_all($re, $str, $matches, PREG_SET_ORDER, 0);

    $list = [];
    foreach ($matches as $field) {
      $constname_uppercase = str_replace(' ', '_', strtoupper($field[3]));
      print_r(
        "    const {$constname_uppercase} = '{$field[2]}';" . PHP_EOL
      );
    }


  }
}