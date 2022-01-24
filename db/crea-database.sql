-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Gen 24, 2022 alle 12:32
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `unipeppers`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `assistente`
--

CREATE TABLE `assistente` (
  `IdDomanda` int(11) NOT NULL,
  `Domanda` varchar(255) NOT NULL,
  `Risposta1` varchar(50) NOT NULL,
  `Risposta2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `assistente`
--

INSERT INTO `assistente` (`IdDomanda`, `Domanda`, `Risposta1`, `Risposta2`) VALUES
(1, 'Cosa vuoi preparare?', 'Cibo', 'Drink'),
(2, 'Che tipo di piatto vuoi cucinare?', 'Primo', 'Secondo'),
(3, 'La tua portata sarà a base di:', 'Carne', 'Pesce'),
(4, 'Che sapore vuoi dare al tuo drink?', 'Secco', 'Dolce'),
(5, 'Scegli il grado di piccantezza', 'Leggero', 'Forte');

-- --------------------------------------------------------

--
-- Struttura della tabella `notifiche`
--

CREATE TABLE `notifiche` (
  `IdNotifica` int(11) NOT NULL,
  `Testo` text NOT NULL,
  `IdUtente` int(11) NOT NULL,
  `StatoNotifica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `IdOrdine` int(11) NOT NULL,
  `DataOrdine` date NOT NULL,
  `StatoOrdine` text NOT NULL,
  `TotalePrezzo` float NOT NULL,
  `IdUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ordini`
--

INSERT INTO `ordini` (`IdOrdine`, `DataOrdine`, `StatoOrdine`, `TotalePrezzo`, `IdUtente`) VALUES
(1, '2021-12-06', 'Consegnato', 4.5, 1),
(2, '2021-11-02', 'Consegnato', 91.1, 2),
(4, '2021-12-21', 'Spedito', 102.5, 4),
(5, '2021-12-29', 'Pronto per il ritiro', 55.7, 1),
(6, '2021-10-27', 'Consegnato', 120, 3),
(7, '2021-12-13', 'Consegnato', 79.5, 4),
(8, '2021-12-06', 'Consegnato', 37.5, 1),
(10, '2022-01-04', 'Spedito', 55.5, 3),
(11, '2021-12-27', 'Pronto per il ritiro', 47, 4),
(47, '2022-01-20', 'Effettuato', 3, 8),
(48, '2022-01-21', 'Carrello', 4, 8),
(49, '2022-01-21', 'Effettuato', 8.5, 1),
(50, '2022-01-21', 'Effettuato', 4.5, 1),
(51, '2022-01-21', 'Effettuato', 4.9, 1),
(52, '2022-01-21', 'Effettuato', 4, 1),
(53, '2022-01-21', 'Effettuato', 3, 1),
(54, '2022-01-21', 'Effettuato', 4.9, 1),
(55, '2022-01-21', 'Effettuato', 4.9, 1),
(56, '2022-01-24', 'Carrello', 19.5, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordiniprodotti`
--

CREATE TABLE `ordiniprodotti` (
  `IdOrdine` int(5) NOT NULL,
  `IdProdotto` int(5) NOT NULL,
  `QuantitaPr` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ordiniprodotti`
--

INSERT INTO `ordiniprodotti` (`IdOrdine`, `IdProdotto`, `QuantitaPr`) VALUES
(1, 2, 1),
(2, 2, 5),
(2, 9, 10),
(2, 10, 4),
(4, 7, 20),
(4, 14, 5),
(5, 4, 8),
(5, 6, 11),
(6, 12, 30),
(7, 5, 4),
(7, 8, 15),
(8, 11, 5),
(8, 13, 10),
(10, 5, 6),
(10, 11, 15),
(11, 6, 10),
(11, 12, 8),
(47, 5, 1),
(48, 3, 1),
(49, 2, 1),
(49, 3, 1),
(50, 2, 1),
(51, 4, 1),
(52, 3, 1),
(53, 5, 1),
(54, 4, 1),
(55, 4, 1),
(56, 1, 3),
(56, 2, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `preferiti`
--

CREATE TABLE `preferiti` (
  `IdUtente` int(11) NOT NULL,
  `IdProdotto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `preferiti`
--

INSERT INTO `preferiti` (`IdUtente`, `IdProdotto`) VALUES
(2, 5),
(3, 14),
(4, 9),
(2, 1),
(2, 6),
(2, 10),
(1, 2),
(1, 1),
(1, 13),
(8, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `IdProdotto` int(10) NOT NULL,
  `NomeProdotto` varchar(50) NOT NULL,
  `ImmagineProdotto` varchar(255) NOT NULL,
  `DescrizioneProdotto` text NOT NULL,
  `PrezzoProdotto` float(6,2) NOT NULL,
  `QuantitaProdotto` int(5) NOT NULL,
  `IdFornitore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`IdProdotto`, `NomeProdotto`, `ImmagineProdotto`, `DescrizioneProdotto`, `PrezzoProdotto`, `QuantitaProdotto`, `IdFornitore`) VALUES
(1, 'Carolina Reaper', 'CarolinaReaper.jpg', '[2.000.000 SHU] \r\nHP22B Carolina Reaper è una nuova varietà di peperoncino ibrida creata nel Sud Carolina a Rock Hill con un Naga Morich Pakistano e Habanero Rosso diventando nel 2013 il peperoncino più potente al mondo con i suoi 1.600.000 sulla scala Scoville. \r\nPeperoncino fresco appena raccolto, appositamente conservato e spedito!\r\n\r\nPrima di acquistare scegli la quantità di prodotto che desideri!', 5.00, 2, 5),
(2, 'Moruga Scorpion', 'MorugaScorpion.jpg', '[1.500.000 SHU] Trinidad Moruga Scorpion è il peperoncino che prende il nome dalla sua isola di origine, Trinidad e raggiunge i 2 milioni di Scoville, aggiudicandosi così 		il primo posto in assoluto! Peperoncino fresco appena raccolto, appositamente conservato e spedito!\r\n\r\nPrima di acquistare scegli la quantità di prodotto che desideri!', 4.50, 2, 6),
(3, 'Naga Viper', 'NagaViper.jpg', '[1.000.000 SHU] Naga Viper è uno dei peperoncini più piccanti al mondo, estremamente piccante è un ibrido creato in Inghilterra incorciando tre peperoncini: Naga Morich, Bhut Jolokia e Trinidad Scorpion che con i suoi picchi di circa 1.382.118 SHU sulla scala Scoville è stato detentore del guinness world record nel 2011, poi battuto dal Trinidad Moruga Scorpion.', 4.00, 2, 7),
(4, 'Habanero Red Savina', 'HabaneroRedSavina.jpg', '[350.000 SHU] Habanero Red è un peperoncino messicano molto piccante che raggiunge 350.000 scoville. I peperoncini sono di colore rosso vivo e misurano 6 cm di larghezza e 4,5 cm di lunghezza, molto piccanti adatti per ogni tipo di utilizzo. Peperoncino fresco appena raccolto, appositamente conservato e spedito!\r\n\r\nPer quantità differenti non esitate a contattarci!', 4.90, 6, 8),
(5, 'Habanero white', 'HabaneroWhite.jpg', '[250.000 SHU] Peperoncini habanero white, piccoli e molto ingannevoli, piccantissimi, 300.000 sulla scala Scoville, molto buoni con risaltate note fruttate, ottimi per 		salse e oli piccanti ed essere consumati a crudo. Peperoncino fresco appena raccolto, appositamente conservato e spedito!\r\n\r\nPrima di acquistare scegli la quantità di prodotto che desideri!', 3.00, 5, 5),
(6, 'RocotoRed', 'RocotoRed.jpeg', '[250.000 SHU] Rocoto Red è un peperoncino che a causa di una conformazione genetica ha reso questa pianta tra le più robuste.\r\nIl peperoncino raggiunge i 250.000 Scoville, è molto amato per essere mangiato crudo e riempito con il tonno.\r\nImportante - Non fatevi ingannare dal suo nome scentifico Rocoto Red e dalla forma infatti è possibile confonderlo con la varietà bacio di satana o peperoncino ciliegia.\r\nPrima di acquistare scegli la quantità di prodotto che desideri!', 1.50, 5, 6),
(7, 'Jalapeno', 'Jalapeno.jpg', '[15.000 SHU] Il peperoncino Jalapeno è originario del messico e coltivato prevalentemente negli Stati Uniti. I frutti sono grandi 6-7 cm e variano dal verde al rosso intenso con un grado di piccantezza medio, molto aromatici, con 10.000 sulla scala Scoville. Peperoncino fresco appena raccolto, appositamente conservato e spedito!\r\n\r\nVisto il suo grado di piccantezza non molto elevato i suoi usi sono molteplici, sott’aceto, in salamoia, fritto ripieno di formaggio (piatto tipico dei ristoranti tex mex americani) e, soprattutto, essiccato al sole e affumicato, diventando il famoso “Chipotle”.\r\n\r\nPrima di acquistare scegli la quantità di prodotto che desideri!', 4.00, 10, 7),
(8, 'Calabrese', 'PeperoncinoCalabrese.jpg', '[30.000 SHU] Il diavolicchio è il peperoncino piccante di origini calabresi per eccellenza. Infatti è comunemente chiamato peperoncino calabrese. E\' mediamente piccante, 25.000 - 35.000 sulla scala Scoville, la pianta è molto produttiva e presenta frutti di circa 3 cm rossi vivi. Varietà molto utilizzata in salse piccanti e piatti della tradizione mediterranea. Peperoncino fresco appena raccolto, appositamente conservato e spedito!\r\n\r\nPrima di acquistare scegli la quantità di prodotto che desideri!', 4.50, 20, 8),
(9, 'BhutLah', 'BhutLah.jpg', '[1.200.000 SHU] Il peperoncino Bhutlah Red SLP, è un ibrido creato incrociando due famose varietà piccantissime della specie Capsicum Chinunse ovvero il super piccante Bhut Jolokia e Trinidad Douglah.\r\n\r\nIn commercio esistono anche diverse varianti con colorazioni differenti come ad esempio il Bhutlah Chocolate, mustard, e per finire gold. Ma staremo a vedere con il tempo quante varianti riescono ad incrociare.\r\nQuesta varietà proviene dalle isole Canarie, dove l\'ibrido è stato creato da un noto appassionato di peperoncino di nome Peter Merle.\r\n\r\nUna seconda variante molto interessante è la versione Black Bhutlah SLP f2 quindi non ancora stabile. Quest\'ultima varietà è stata realizzata da un professore di nome Christopher Pillips.', 4.90, 3, 5),
(10, 'Pequin', 'Pequin.jpg', '[100.000 SHU] Pequin: peperoncino di piccole dimensioni e appartiene alla famiglia dei Capsicum Annuum, ideali per il consumo immediato sia fresco che congelato, grazie alla sua piccantezza un singolo peperoncino basta per una porzione, molto comodo durante i pasti.\r\n\r\nGrazie al suo colore attraente e le sue dimensioni ridotte in passato era molto ricercato dagli uccelli, che ha determinato la nascita di molte altre specie di peperoncino. ', 4.90, 5, 6),
(11, 'Macarena', 'Macarena.jpg', '[50.000 SHU] Questa è una varietà domestica creata in Italia dal Sig. Mario Dadomo nell’azienda agraria sperimentale Stuard di Parma.\r\n\r\nLa pianta può raggiungere 80 CM di altezza, foglie a forma ovoidale di colore verde scuro con fiori di colore bianco con una leggera sfumatura violacea. I frutti sembrano avere una forma aerodinamica, ricordano molto la punta di una lancia.\r\n\r\nI frutti nella prima fase sono verdi, per poi passare ad un bellissimo nero lucido e per finire, quando sono ginunti alla completa maturazione assumono un colore rosso cupo.\r\n\r\nLa particolarità che più ci ha colpito è la resistenza della pianta, sia fusto che rami hanno una grande flessibilità, resistente al vento e perfino acquazzoni.\r\n\r\nLa consigliamo come pianta ornamentale e anche per arricchire i nostri pianti quando i frutti arrivano a maturazione.\r\n\r\nLe dimensioni che possono raggiungere i peperoncini sono le seguenti: 2.5 – 3 cm di altezza.\r\n\r\nIl livello di piccantezza raggiunge i 50.000 Sulla scala di Scoville.\r\n', 2.50, 4, 7),
(12, 'Cayenne', 'Cayenne.jpg', '[30.000 SHU] Peperoncini Carolina Cayenne originari del Sud America, importato, coltivato e consumato in tutto il mondo, è uno dei peperoncini più utilizzati dagli italiani! Il peperoncino è di colore rosso vivo, lungo e fino, molto carnoso, ottimo per ogni utilizzo con 150.000 sulla scala Scoville. Peperoncino fresco appena raccolto, appositamente conservato e spedito!\r\n\r\nPrima di acquistare scegli la quantità di prodotto che desideri!', 4.00, 5, 8),
(13, 'Peperoncino Ciliegia', 'PeperoncinoCiliegia.jpg', '[7.000 SHU] Vendita online peperoncino ciliegia fresco, coltivato naturalmente. \r\n\r\nPer avere maggiori informazioni su questa varietà inclusa la coltivazione, grandezza della pianta ecc... è possibile consultarle il seguente articolo: Peperoncino ciliegia\r\n\r\nRicordiamo ai visitatori che questa varietà di peperoncino è la stessa con cui si riempiono i barattoli di vetro con peperoncini leggermente piccanti di forma tonda ripieni al tonno buoni e gustosi. Si trovano spesso nei supermercati ben forniti oppure vengono venduti da produttori locali. Molto diffusi ed apprezzati in Italia.', 2.50, 10, 8),
(14, 'Tomato Pepper', 'TomatoPepper.jpg', '[1.000 SHU] Tomato Pepper - Peperoncino Pomodoro è una varietà di peperoncino rarissima, commercializzata SOLO dal nostro sito, che prende il nome proprio dai frutti che sono grandi come i pomodori, con i suoi 1.000 sulla scala Scoville possono essere consumati crudi, cotti al forno a  piacimento e per condimenti vari. Peperoncino fresco appena raccolto, appositamente conservato e spedito!\r\n\r\nPrima di acquistare scegli la quantità di prodotto che desideri!', 4.50, 5, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `ricette`
--

CREATE TABLE `ricette` (
  `IdRicetta` int(11) NOT NULL,
  `NomeRicetta` varchar(255) NOT NULL,
  `ImmagineRicetta` varchar(255) NOT NULL,
  `Ingredienti` text NOT NULL,
  `Procedimento` text NOT NULL,
  `Difficolta` varchar(20) NOT NULL,
  `Persone` int(5) NOT NULL,
  `Tempo` varchar(10) NOT NULL,
  `Costo` varchar(20) NOT NULL,
  `GradoPiccantezza` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `ricette`
--

INSERT INTO `ricette` (`IdRicetta`, `NomeRicetta`, `ImmagineRicetta`, `Ingredienti`, `Procedimento`, `Difficolta`, `Persone`, `Tempo`, `Costo`, `GradoPiccantezza`) VALUES
(1, 'Tortini di biscotti e cioccolato alla mouse e peperoncino', 'tortini.jpg', '100g biscotti Plasmon, 175g cioccolato fondente, 60g burro, peperoncino in polvere, 2 uova, 55g zucchero, 4 cucchiai panna montata, 2 peperoncini rossi piccanti, 1 scorza di arancia', 'Preparate la base. Fate fondere il burro a bagnomaria e fatelo raffreddare. Sbriciolate Biscotti Plasmon “dei Grandi” con gocce di cioccolato nel mixer, trasferiteli in una ciotola, aggiungete il burro fuso e mescolate bene con una spatola o un cucchiaio. Foderate un vassoio (di cartoncino, plastica o quel che volete) con un foglio di carta da forno, posizionatevi sopra 4 dischi coppapasta, da 8 cm circa di diametro, con le pareti abbastanza alte e distribuite, sul fondo, il composto di biscotti, pressandolo in uno strato omogeneo. Trasferite il vassoio in frigorifero. Spezzettate il cioccolato, fatelo fondere a bagnomaria fino a ottenere una crema omogenea, aggiungete 1-2 pizzichi di peperoncino in polvere, mescolate e fate raffreddare quasi completamente.  Distribuite il cioccolato, in parti uguali, sulla base ai biscotti e mettete di nuovo in frigorifero. Preparate la mousse. Montate con la frusta, in una ciotola, le uova con lo zucchero fino a ottenere un composto chiaro e spumoso. Fate fondere a bagnomaria il cioccolato spezzettato con il burro, mescolando fino a ottenere una crema liscia, fatela intiepidire e, poi, incorporatela delicatamente al composto di uova, mescolando con la spatola dall’alto al basso per non smontare il composto. Distribuite la mousse nei coppapasta e lasciatela in frigorifero per un’ora. Pulite i peperoncini, tagliateli a metà nel senso della lunghezza ed eliminate i semi. Versate in un piccolo tegame 1,5 dl di acqua con la scorzetta di arancia, lo zucchero rimasto e i peperoncini, fate sobbollire per 10 minuti e fate raffreddare i peperoncini nello sciroppo di cottura. Sbriciolate, infine, i biscotti rimasti. Togliete dal frigorifero il vassoio con i dolci, trasferiteli direttamente sui piatti utilizzando una spatola sottile, attendete qualche minuto e togliete delicatamente i coppapasta sfilandoli verso l’alto.  Guarnite ogni tortino con un cucchiaio di panna, una spolverizzata di biscotti, un pizzico di peperoncino in polvere e mezzo peperoncino sciroppato.', 'Medio', 4, '60 minuti', 'Basso', 'Basso'),
(2, 'Peperoncini piccanti ripieni di tonno', 'peperoni-tonno.jpg', '800g peperoncini tondi piccanti, 400g tonno in scatola, 1 cucchiaio di capperi, 50g filetti di acciughe sott\'olio, 2 rametti di menta, 1/2 litro aceto di vino bianco, olio extravergine di oliva', 'Per preparare i peperoncini ripieni di tonno lavate con cura i peperoncini e asciugateli. Con un coltellino togliete il picciolo e scavateli in modo da eliminare i semini interni. Sciacquateli in acqua fredda corrente e trasferiteli in una casseruola con l\'aceto e mezzo litro d\'acqua. Cuocete i peperoncini per 6 minuti dall\'inizio del bollore, scolateli e capovolgeteli ad asciugare su un canovaccio da cucina pulito. I tempi di riposo possono variare da un minimo di 4-5 ore a un\'intera notte. Sciacquate poi i capperi, metteteli a mollo in una ciotola con acqua tiepida per 20 minuti, sciacquateli nuovamente e trasferiteli in un mixer. Unite il tonno scolato, le acciughe, 3 foglioline di menta lavate e asciugate e frullate fino a ottenere un composto omogeneo. Farcite i peperoncini con il composto preparato e disponeteli nei vasetti sterilizzati. Copriteli con l\'olio fino almeno a un centimetro, chiudete i vasi e sterilizzateli di nuovo a bagnomaria, partendo da acqua tiepida, per 15 minuti dall\'inizio dell\'ebollizione. Fate raffreddare i vasi nell\'acqua e lasciateli riposare per un mese prima del consumo. Passato un mese, gustate i vostri peperoncini piccanti ripieni di tonno. ', 'Media', 4, '30 minuti', 'Medio', 'Medio'),
(3, 'Bloody Mary', 'bloodyMary.jpg', '45ml vodka, 90ml succo di pomodoro, succo di limone fresco, poche gocce di Salsa Worchestershire, poche gocce di Tabasco, sale, pepe, ghiaccio, sedano', 'Per preparare il Bloody Mary versate il succo di pomodoro nello shaker. Spremete il limone. Procedete aggiungendo qualche goccia di tabasco e salsa Worchestershire. Poi, aggiungete sale e pepe. Mescolate gli ingredienti nello shaker con l\'aiuto di un bar spoon. Versate a questo punto la vodka con un jigger, il dosatore che vi permette di controllare con precisione le dosi degli ingredienti per un risultato equilibrato. Aggiungete qualche cubetto di ghiaccio direttamente nello shaker. Miscelate con la tecnica del Trowing, ossia versando da uno shaker all\'altro per più volte. Aprite lo shaker e nella parte dal quale il cocktail viene versato bloccate il ghiaccio con uno strainer, accessorio da bar, usato per rimuovere il ghiaccio dai cocktail dopo essere stati miscelati o agitati. Filtrate quindi il cocktail in un tumbler alto. Completate il vostro Bloody Mary decorandolo con un gambo di sedano. Buon aperitivo.', 'Media', 1, '10 minuti', 'Medio', 'Basso'),
(4, 'Filetto di salmone alla griglia con peperoncini e purè di avocado', 'filetto-salmone-griglia.jpg', '4 filetti di salmone norvegese fresco da 200 g ciascuno, 2 avocado maturi, 6 cucchiai di succo di lime, sale, pepe, 2 peperoncini, 4 cucchiaini di miele, 4 cucchiai di olio extravergine d\'oliva, 1 scalogno grande', 'Taglia i due avocado a metà e preleva la polpa con un cucchiaino. Trasferiscila nel mixer insieme al succo di lime e riduci il tutto in una crema setosa e omogenea. Regola di sale e pepe fresco di mulinello. Prepara la salsa tagliando i peperoncini a rondelle, eliminando i semi. In una ciotolina mescolali con lo scalogno tagliato a fettine, il succo di lime, il miele e l’olio. Aggiusta di sale e amalgama bene. Cuoci i filetti di salmone su di una piastra di ghisa ben calda per circa 4 minuti dal lato della pelle. Girali, aggiungi un filo d’olio e completa la cottura in base allo spessore. Regola di sale e pepe, nappa i filetti con la salsa ai peperoncini e servi subito insieme al purè di avocado.', 'Facile', 4, '30 minuti', 'Alto', 'Basso'),
(5, 'Confettura di peperoncini piccanti', 'confettura.jpg', '250g peperoncini piccanti freschi, 350g di peperoni rossi, 500g di zucchero semolato, 1 tazzina di vino rosso, 1 tazzina di acqua', 'Preparare la confettura di peperoncini piccanti è semplice. Per prima cosa, lavate, asciugate e tagliate a metà i peperoncini utilizzando i guanti protettivi ed eliminate picciolo, semi e filamenti. Lavate, asciugate e pulite i peperoni eliminando anche qui picciolo, semi e filamenti, quindi tagliateli a cubetti piccoli. Raccogliete i peperoni e i peperoncini in una casseruola capiente. Aggiungete lo zucchero, l’acqua e il vino, quindi portate su fuoco medio-basso e cuocete per circa un’ora mescolando di frequente e monitorando la cottura. Appena il composto inizierà ad apparire denso, levate dal fuoco e frullate tutto con un mixer a immersione. Riportate sul fuoco e cuocete per qualche altro minuto. Quando versando un cucchiaino di confettura su un piattino inclinato, il composto farà resistenza a scivolare, spegnete e levate dal fuoco. Trasferite la confettura bollente in vasetti sterilizzati, tappateli subito e capovolgeteli lasciandoli raffreddare completamente per formare il sottovuoto. La confettura di peperoncini piccanti è pronta per essere consumata subito o conservata.', 'Facile', 5, '1h e 30min', 'Basso', 'Medio'),
(6, 'Chili con carne', 'chili.jpg', '800g polpa di manzo, 500g fagioli rossi o neri lessati, 400g, polpa di pomodoro, 150g peperoncini dolci, 150g cipolla bianca, uno spicchio d\'aglio, 30g di cumino in semi, 20g di paprika piccante, 1 cucchiaio di zucchero di canna, 1 pizzico di origano, 2 peperoncini jalapeño, olio extravegine di oliva, sale, pepe', 'Per preparare il chili con carne iniziate a tagliare la carne a cubetti piccini. Tritate grossolanamente anche i peperoni dolci, la cipolla e i peperoncini. Mettete in una pentola capiente 2 o 3 cucchiai d\'olio e l\'aglio e quando gli spicchi iniziano a soffriggere aggiungete il trito di verdure. Lasciate soffriggere per circa due minuti a fuoco vivo quindi unitevi metà delle spezie, girando subito per evitare che brucino. Dopo pochi istanti aggiungete la carne e il resto delle spezie, un cucchiaio di sale e mescolate il tutto. Coprite con un coperchio e abbassate la fiamma. Dopo circa 20 minuti di cottura unite la passata di pomodoro, lo zucchero di canna e un pizzico di origano. Mescolate e lasciate cuocere per circa 70 minuti sempre a fuoco basso, mescolando di tanto in tanto. Trascorsi 70 minuti aggiungete i fagioli, mescolate, regolate di sale se lo ritenete necessario e fate cuocere, sempre a fuoco lento, per altri 20 minuti. Spegnete il fuoco, fate riposare qualche minuto quindi servite il chili con carne insieme a del riso bianco, tortillas o nachos.', 'Elevata', 5, '2h e 20min', 'Medio', 'Alto'),
(7, 'Devil\'s Tongue', 'devil-tongue.jpg', '5cl tequila, 4 fragole, 3g peperoncino in polvere, 1cl di Crème de menthe, 2cl succo di lime, 1cl sciroppo di zucchero', 'Mettete il peperoncino, il succo di lime e le fragole tagliate a pezzi nello shaker, versate la crème de menthe e pestate con il muddler. Quando sono ben spappolate, aggiungete la tequila e lo sciroppo di zucchero, qualche cubetto di ghiaccio e agitate ferocemente per 20 secondi. Colmate un tumbler con ghiaccio fresco e versate il cocktail senza filtrare: deve avere un aspetto “grezzo”. Guarnite con una fragola e servite.', 'Facile', 1, '5 minuti', 'Basso', 'Basso'),
(8, 'Burning Lotus', 'burning-lotus.jpg', '4cl cognac, 2cl marsala, 2 cucchiaini di salsa piccante agrodolce thailandese, 2 gocce di Angostura', 'Mettete la salsa agrodolce piccante nel mixing glass o in uno shaker, aggiungete due cucchiaini di acqua e rimescolate per sciogliere. Aggiungete il ghiaccio, il cognac, l’angostura, lo sherry amontillado e mescolate dolcemente. Mettete un pezzo di ghiaccio grande in un bicchiere old fashioned, versate filtrando con il julep e decorate con due rondelle di peperoncino fresco. Servite il drink Burning Lotus, un cocktail piccante, ma vellutato che saprà come stupire il vostro palato.', 'Facile', 1, '5 minuti', 'Medio', 'Alto'),
(9, 'Penne all\'arrabbiata', 'penne-arrabbiata.jpg', '5 pomodorini San Marzano maturi, 320g penne rigate, 1 peperoncino rosso, 1 spicchio d\'aglio, olio extravergine di oliva, prezzemolo tritato, pecorino romano, sale', 'Realizzate il condimento delle penne all\'arrabbiata mentre l\'acqua bolle e la pasta cuoce. Mettete in una padella 2-3 cucchiai di olio, lo spicchio d\'aglio schiacciato e il peperoncino tagliuzzato, dopo averne tolti tutti i semi. La fiamma dovrà essere moderata, l\'olio deve insaporirsi ma non bruciare. Tagliate i pomodori a metà, eliminate i semi e quindi riduceteli a cubetti. Levate l\'aglio dalla padella e versatevi i cubetti di pomodoro. Fateli scaldare per qualche minuto fino a quando otterrete una salsa leggera e ancora ben colorita. Una volta che le penne sono cotte al dente, scolatele e versatele direttamente sulla salsa. Mescolate bene in modo che la pasta sia condita in maniera uniforme quindi unite un giro d\'olio crudo. Impiattate, completate con un po\' di prezzemolo, pecorino grattugiato a piacere e servite subito le penne all\'arrabbiata.', 'Facile', 4, '10 minuti', 'Basso', 'Medio'),
(10, 'Olio al peperoncino', 'olio-peperoncino.jpg', 'peperoncini freschi piccanti, olio extravergine di oliva, sale', 'Aprite i peperoncini a metà, eliminate i semi e tagliateli a rondelle, salateli e lasciateli riposare per un giorno. Trasferiteli in un colino a rete e lasciateli sgocciolare 2 ore. Distribuite i peperoncini in un vasetto e versatevi olio fino a coprirli. Dopo alcune settimane l’olio, diventato piccante, è pronto per essere usato. Da conservare in frigorifero.', 'Facile', 1, '40 minuti', 'Basso', 'Medio'),
(11, 'Pasta alla carrettiera', 'carrettiera.jpg', '360g spaghetti, 120g pecorino stagionato, 1 mazzetto di prezzemolo, 1 peperoncino rosso fresco, 1 spicchio d\'aglio, olio extravergine d\'oliva, sale', 'Preparare la pasta alla carrettiera è semplice e veloce. Mentre lessate gli spaghetti tritate l\'aglio e il peperoncino finemente e raccoglieteli in una ciotola con abbondante olio e il sale. Emulsionate il tutto con una forchetta. Scolate la pasta al dente, trasferitela nella zuppiera e conditela con l\'emulsione preparata, aggiustando la consistenza con un po\' di acqua di cottura della pasta. Aggiungete il pecorino grattugiato, un po\' di altra acqua di cottura della pasta e mantecate. Unite il prezzemolo fresco tritato, trasferite la pasta alla carrettiera nei singoli piatti e servite immediatamente.', 'Facile', 4, '15 minuti', 'Basso', 'Medio');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `IdUtente` int(11) NOT NULL,
  `Nome` varchar(50) NOT NULL,
  `Cognome` varchar(50) NOT NULL,
  `Mail` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `TipologiaUtente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`IdUtente`, `Nome`, `Cognome`, `Mail`, `Password`, `TipologiaUtente`) VALUES
(1, 'Mario', 'Rossi', 'mario.rossi@gmail.com', 'pepper1', 'c'),
(2, 'Luca', 'Bianchi', 'luca.bianchi@gmail.com', 'pepper2', 'c'),
(3, 'Giorgia', 'Verdi', 'giorgia.verdi@gmail.com', 'pepper3', 'c'),
(4, 'Enrico', 'Neri', 'enrico.neri@gmail.com', 'pepper4', 'c'),
(5, 'Marta', 'Celli', 'marta.celli@gmail.com', 'pepper5', 'f'),
(6, 'Gianluca', 'Mastri', 'gianluca.mastri@gmail.com', 'pepper6', 'f'),
(7, 'Sara', 'Franchi', 'sara.franchi@gmail.com', 'pepper7', 'f'),
(8, 'Marco', 'Fuzzi', 'marco.fuzzi@gmail.com', 'pepper8', 'f');

-- --------------------------------------------------------

--
-- Struttura della tabella `varieta`
--

CREATE TABLE `varieta` (
  `IdVarieta` int(50) NOT NULL,
  `NomeVarieta` varchar(50) NOT NULL,
  `ImmagineVarieta` varchar(255) NOT NULL,
  `DescrizioneVarieta` text NOT NULL,
  `Piccantezza` int(10) NOT NULL,
  `Gusto` int(10) NOT NULL,
  `Estetica` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `varieta`
--

INSERT INTO `varieta` (`IdVarieta`, `NomeVarieta`, `ImmagineVarieta`, `DescrizioneVarieta`, `Piccantezza`, `Gusto`, `Estetica`) VALUES
(1, 'Carolina Reaper', 'CarolinaReaper.jpg', 'Il peperoncino Carolina Reaper è rosso intenso e presenta una estremità che va a ricordare la coda dello scorpione, raggiunge una lunghezza che varia dai 6 agli 8 cm e impiega circa 90 giorni per maturare. \r\n\r\nLascia in bocca oltre ad un elevato bruciore un gusto fruttato, quasi dolce, che richiama la cannella e cioccolato, la concentrazione di capsaicina è talmente elevata che se entra a contatto con la pelle provoca dolore che tende a sparire nell\'arco di una ventina di minuta senza arrecare danni.\r\n\r\nNonostante tutto nel suo paese di origine è molto amato e coltivato, anche in Italia sta prendendo piede negli ultimi anni, si stima che nel 2017 diventi un peperoncino molto apprezzato dai migliori chef no che uno dei peperoncini più coltivati in Italia preda di curiosi e amanti del piccante estremo.\r\n\r\nEsistono diverse varietà, fra queste citiamo:\r\n	Carolina Reaper Caramel\r\n	Carolina Reaper Chocolate\r\n	Carolina Reaper Mustard\r\n	Carolina Reaper White\r\n	Carolina Reaper Yellow\r\n	Carolina Snake\r\n	Carolina Snake Yellow', 10, 6, 9),
(2, 'Moruga Scorpion', 'MorugaScorpion.jpg', 'Il peperoncino Trinidad Moruga Scorpion è considerato uno dei peperoncini più piccanti del mondo. Originario della regione di Moruga situata nel sud dell’isola di Trinidad, è grande come una pallina da golf e deve il suo nome alla particolare forma che assume la sua base che ricorda la coda di uno scorpione. Con un grado di piccantezza compreso tra 1.200.000-2.000.231 SU (unità di Scoville, la scala che misura la piccantezza dei peperoncini) è circa 5 volte più piccante del famoso Habanero (325.000 SU) e 100 volte più piccante di un peperoncino calabrese (15.000 SU)\r\n\r\nHa un gusto particolare che lo rende molto apprezzato in cucina; i coraggiosi che l’hanno assaggiato in purezza descrivono un’iniziale piacevole gusto dolce e fruttato che lascia poco dopo spazio a un bruciore sempre più insopportabile. In commercio si può trovare fresco o secco, sott’olio o in polvere e può essere utilizzato, con 		parsimonia, in tutte le preparazioni che richiedono il peperoncino, da un semplice piatto di spaghetti con aglio e olio alle tipiche salse calabresi al peperoncino.\r\n\r\nEsistono diverse varietà, fra queste citiamo:\r\n	Trinidad Moruga Caramel\r\n	Trinidad Moruga Scorpion Chocolate\r\n	Trinidad Moruga Scorpion Green\r\n	Trinidad Moruga Scorpion Peach\r\n	Trinidad Moruga Scorpion White\r\n	Trinidad Moruga Scorpion Yellow\r\n	Trinidad Scorpion Butch T', 10, 8, 9),
(3, 'Naga Viper', 'NagaViper.jpg', 'Naga vuol dire serpente, in nome Naga Viper indurrebbe a pensare ad un tipo di serpente velenoso, la vipera. Questa varietà è stata chiamata Naga Viper dal suo creatore Gerald Fowler, un agricoltore della Chilli Pepper Company in Inghilterra incrociando 3 varietà di peperoncini, Naga Morich, Bhut Jolokia e Trinidad Scorpion. “Viper” proprio perché il peperoncino a completa maturazione è di forma irregolare con una punta, dal sapore pungente proprio come una vipera! Questa varietà nel 2011 è stata detentrice del guinness world record, raggiungendo nella scala Scoville ben 1.082.118 SHU. SHU sta per Scoville Heat Units ed è una scala di misura della piccantezza del peperoncino. Giusto per dare un’idea della forza del Naga Viper, si pensi che un peperoncino nella media rientra tra i 2.500 ed i 8.000 sulla scala diScoville.', 10, 7, 8),
(4, 'HabaNero', 'HabaneroVarieta.png', 'Dalla forma tozza, cosiddetta “a lanterna”, di certo il nostro peperoncino non si può definire sinuoso e seducente; esso può presentarsi con la punta più o meno allungata, conica o rientrante, a seconda della specifica varietà di habanero. Infatti esistono più qualità di questa specie, come i più noti Habanero Chocolate (di colorazione marrone), gli Orange (di colorazione arancione) e i Red Savina (di un bel rosso fuoco). Meno conosciuti forse, ma sempre diabolicamente piccanti, sono l’Amarillo, il Caribbean Red e il Fatalii (nome che, diciamolo, è tutto un programma).\r\n\r\nDiventa famoso nel lontano 1994 dove era il peperoncino più piccante del mondo ormai battuto da molte altre specie di peperoncino. Il suo gusto è molto acceso e aromatico. \r\nIl valore limite stabilito arbitrariamente da Scoville fu quello di 16’000’000: capsaicina pura.\r\n\r\nEsistono diverse varietà, fra queste citiamo:\r\n	Habanero Paper Lantern\r\n	Habanero Mustard\r\n	Habanero Golden\r\n	Habanero Green\r\n	Habanero Red Savina\r\n	Habanero Peach\r\n	Habanero Orange Blob\r\n	Habanero Orange\r\n	Habanero Caribbean Red\r\n	Habanero Red Long\r\n	Habanero White Giant\r\n	Habanero White Bullet\r\n	Habanero White\r\n	Habanero Chocolate Long\r\n	Habanero Chocolate\r\n	Habanero Yellow\r\n	Habanero Yellow Westindian', 7, 10, 8),
(5, 'RocotoRed', 'RocotoRed.jpeg', 'Rocoto Red è una varietà di peperoncino molto particolare originaria del Perù, nata da una conformazione genetica e si trova naturalmente anche a 2500 mt di altitudine. Particolare proprio per questo motivo, la conformazione genetica la rende unica dalle altre specie in quanto è la sola a resistere alle basse temperature; al contrario, fa fatica a resistere al caldo torrido ma la pianta sopravvive ugualmente, ma non produce peperoncini o peggio, produce peperoncini ma prima di arrivare a maturazione cadono dalla pianta senza motivo, come una vera ed autentica esecuzione.\r\nIl secondo problema è il livello di piccantezza dei peperoncini, se la pianta non trova un Habitat  perfetto potrebbe fruttificare senza però produrre frutti molto piccanti. \r\nTende a confondersi con la varietà bacio di satana o peperoncino ciliegia.', 8, 9, 8),
(6, 'Jalapeno', 'Jalapeno.jpg', 'Tra i peperoncini messicani il peperoncino Jalapeno è uno dei peperoncini più conosciuti in Europa. Questo peperoncino afrodisiaco si presta molto bene a molteplici utilizzi in cucina, non è esageratamente piccante, e per questo è adatto a tutti.\r\nIl peperoncino Jalapeno ha una grandezza media che varia dai 4 ai 9 centimetri, ha origini spagnole e nahuati, e il suo nome deriva da Jalapa, una città messicana.\r\nE’ molto utilizzato nelle cucine texana e messicana, e gode di grande apprezzamento negli Stati Uniti, oltre che in Europa.\r\nQualcuno potrebbe aver sentito parlare del peperoncino Jalapeno messicano con i nomi di gordo, cuarsmenho e huacinango, che si riferiscono tutti allo stesso prodotto. Può però differenziarsi per forma, grandezza, tipologia e può essere più o meno piccante.\r\nIn questo caso possiamo distinguere i peperoncini Jalapenos con i nomi di purple, jumbo, early e via dicendo. Ma cerchiamo di saperne di più questo peperoncino messicano, su come coltivarlo e soprattutto cucinarlo, creando ricette appetitose e, perché no, afrodisiache.', 4, 9, 8),
(7, 'Peperoncino Calabrese', 'PeperoncinoCalabrese.jpg', 'Il classico e comunissimo peperoncino calabrese, chiamato in diversi modi, diavolicchio, peperoncino di Soverato, peperoncino calabrese a mazzetti, è una delle varietà dei peperoncini classici calabresi molto amato ed apprezzato nella nostra cucina, con una piccantezza media, intorno i 30.000 sulla scala Scoville.\r\n\r\nGrazie al profumo e la piccantezza adatta ai meno veterani del piccante, permette di rendere anche le ricette più semplici, gustose e speciali, particolarmente indicata per la lavorazione sott’olio, rende meglio degli altri come sapore ed aroma.', 4, 10, 9);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `assistente`
--
ALTER TABLE `assistente`
  ADD PRIMARY KEY (`IdDomanda`);

--
-- Indici per le tabelle `notifiche`
--
ALTER TABLE `notifiche`
  ADD PRIMARY KEY (`IdNotifica`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`IdOrdine`);

--
-- Indici per le tabelle `ordiniprodotti`
--
ALTER TABLE `ordiniprodotti`
  ADD PRIMARY KEY (`IdOrdine`,`IdProdotto`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`IdProdotto`);

--
-- Indici per le tabelle `ricette`
--
ALTER TABLE `ricette`
  ADD PRIMARY KEY (`IdRicetta`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`IdUtente`);

--
-- Indici per le tabelle `varieta`
--
ALTER TABLE `varieta`
  ADD PRIMARY KEY (`IdVarieta`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `assistente`
--
ALTER TABLE `assistente`
  MODIFY `IdDomanda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `notifiche`
--
ALTER TABLE `notifiche`
  MODIFY `IdNotifica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT per la tabella `ordini`
--
ALTER TABLE `ordini`
  MODIFY `IdOrdine` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `IdProdotto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT per la tabella `ricette`
--
ALTER TABLE `ricette`
  MODIFY `IdRicetta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `IdUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT per la tabella `varieta`
--
ALTER TABLE `varieta`
  MODIFY `IdVarieta` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
