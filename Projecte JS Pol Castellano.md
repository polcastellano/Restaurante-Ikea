# Projecte JavaScript

El projecte de JavaScript s'ha basat en 5 parts:
 1. Ressenyes del restaurant
 2. Programa de fidelitat
 3. QR
 4. Propines
 5. Filtre de Productes

# Ressenyes del restaurant

Per fer les ressenyes, el primer que he fet és actualitzar la base de dades perquè hi hagi una nova taula de ressenyes i que aquestes tinguin relació amb les comandes. Després, mitjançant PHP, he comprovat si la comanda té ressenya o no. En cas de que no en tingui, mostro un formulari que s'envia per JS per insertar la ressenya correctament a través de l'API. En cas de que hi hagi ressenya, aquesta es mostra recollint 2 inputs amagats i carregant la ressenya.

Quan inseriu una nova ressenya, es mostra un missatge amb el NotieJS que indica si s'ha inserit correctament, i tot seguit recarrega la pàgina.

Un cop fet això, he creat una pàgina de ressenyes on es mostren totes les ressenyes, i on pots aplicar filtres de quantes estrelles té de valoració i ordenar de major a menor, tot controlat per JS i fent ús del filter i sort en l'array de ressenyes.

# Programa de fidelitat

El primer que necessitava aquí era afegir a cada usuari un camp a la base de dades de punts que aniran acumulant per comanda. Després, a la comanda, afegir els punts que guanyaràs i els que has utilitzat, per després veure-ho.

Un cop fet això, el que he fet és que en finalitzar la comanda, depenent del preu, guanyes uns punts o uns altres. Per exemple, si la comanda és de 2,99€, sumaràs 299 IKEA Points. Aquests punts els pots utilitzar a la comanda amb un input range que actualitza el preu total de la comanda mitjançant JS. Després, envia el formulari de finalització de comanda a través de l'API. A més, l'usuari, al seu panell, pot visualitzar quant punts té.

I en cas que vulguis utilitzar tots els punts, hi ha un límit que, quan tens suficients punts per pagar la comanda gratuïtament, no pots afegir-ne més.

# Generador de QR

Per generar el codi QR, m'he baixat la llibreria QRcode de Git per poder-la utilitzar al Plesk i en local. D'aquesta manera, quan finalitzes la comanda, et surt un codi QR en una nova finestra. En escanejar-lo, s'obre una pàgina amb el detall de la comanda. Tot seguit, a la finestra original, s'et redirigeix a la teva pàgina del compte, on pots veure totes les teves comandes.

# Propines

El primer que he fet és afegir a la comanda un nou camp a la base de dades que és la propina que es deixarà per comanda.
A la pantalla de finalitzar comanda he afegit un input amb rol d'interruptor, el qual està marcat per defecte, i amb un botó amb un valor predeterminat del 3%. Després, pots seleccionar un 20%, 35% o 50%.
I en cas de desmarcar si vols deixar propina o no amb l'interruptor, la propina serà de 0 € i tot això ho gestiono amb JS i enviant també la propina final a l'API com els punts IKEA que es gasten a la comanda.

# Filtre de productes


Per fer el filtre de productes, he utilitzat uns caselles de selecció que per defecte estan marcades, de manera que es mostraran tots els productes. No obstant això, si intentes desmarcar-los tots, apareixerà un missatge a la pantalla que has d'acceptar i no et permetrà desmarcar tots els filtres. Tot això està controlat amb JS i tot el menú està fet amb JS. El filtre és un array que gestiona el mateix JS i en aquest apartat he afegit el Local Storage per emmagatzemar els filtres seleccionats, de manera que quan tanquis i obrissis la pàgina, es mantindrien els mateixos filtres seleccionats.

Una part més complicada ha sigut haver de canviar la manera en què envio els productes a favorits o al cistell, ja que he hagut d'enviar les dades per l'API i ha sigut una mica més feixuc. També, en afegir a favorits, faig una redirecció a la pàgina de favorits que he hagut de buscar per internet i provar bastant per aconseguir-ho.
