const competenze = [{
        id: 1,
        title: 'Contenzioso, arbitrato ed ADR',
        content: 'AGMLEX assiste la propria clientela in sede giudiziale, in ogni stato e grado, inclusi i giudizi dinanzi alla Corte di Cassazione, nelle procedure alternative di soluzione delle controversie (ADR) e nel settore degli arbitrati nazionali ed internazionali dinanzi la ICC di Parigi. Lo studio è specializzato nel contezioso nell’ambito dei contratti e obbligazioni, diritti immobiliari, recupero dei crediti deteriorati, delle problematiche connesse alla risoluzione dei contratti di leasing immobiliare.<br><br>Lo Studio si avvale di una consolidata rete di avvocati di provata esperienza e capacità nei settori del diritto del lavoro, amministrativo e penale e collabora stabilmente con avvocati a Parigi, Londra e Monaco di Baviera.'
    },
    {
        id: 2,
        title: 'Insolvenza, procedure concorsuali e ristrutturazioni',
        content: 'AGMLEX tramite i suoi soci e consulenti vanta consolidata esperienza in materia di procedure concorsuali (concordato preventivo, fallimento, piani di ristrutturazione, etc.).'
    },
    {
        id: 3,
        title: 'Diritto bancario e finanziario',
        content: 'AGMLEX assiste società in operazioni di leasing e asset finance, finanza per le acquisizioni, finanza di progetto e finanza immobiliare.'
    },
    {
        id: 4,
        title: 'Diritto societario',
        content: 'AGMLEX si occupa di tutti gli aspetti del diritto societario e in modo particolare, nella definizione e redazione degli assetti statutari, di governance e dei patti parasociali.'
    },
    {
        id: 5,
        title: 'Diritto civile e commerciale',
        content: 'AGMLEX ha conseguito notevole esperienza in materia di diritto civile e commerciale, specializzandosi nel corso degli anni nella contrattualistica nazionale ed internazionale, con riferimento ad accordi commerciali, di fornitura, distribuzione, concessione, franchising, agenzia, appalti, concessione di licenze.'
    },
    {
        id: 6,
        title: 'Hotel, Resort and Tourism',
        content: 'AGMLEX è convolta in operazioni alberghiere, nella redazione e stipulazione di contratti di management, franchising e license con primarie catene internazionali. Attraverso la collaborazione con società specializzate nella consulenza alberghiera ha sviluppato un sistema c.d. di security package volto alla ristrutturazione di aziende in crisi con la finalità di creare la migliore redditività e conservazione degli asset alberghieri in vista della futura vendita, anche per conto di società di leasing.'
    },
    {
        id: 7,
        title: 'NPL / UTP',
        content: 'AGMLEX ha costituito un team per lo svolgimento delle attività connesse al settore dei crediti in sofferenza. In particolare, il team è costituito da avvocati e consulenti esperti del settore immobiliare che ha maturato esperienza nell’ambito delle Due Diligence per la valutazione accurata dei profili di real estate e litigation relativi alle cessioni di crediti NPL e UTP. Il team svolge la propria attività con dedizione, professionalità e flessibilità sull’intero territorio nazionale; attività tanto giudiziale quanto stragiudiziale volta al recupero dei crediti. Lo studio ha altresì maturato una notevole esperienza nel settore del contenzioso concernente il leasing immobiliare.'
    },
    {
        id: 8,
        title: 'Automotive',
        content: 'Lo studio ha maturato conoscenza e competenza nel settore automotive per essersi occupato dei Regolamenti UE in materia di distribuzione selettiva e block exemption. In particolare si è occupato della redazione dei contratti standard di concessione, e di riparatore autorizzato, per conto di importanti case automobilistiche estere. Ha seguito, dal punto di vista strettamente giuridico, la ristrutturazione di reti distributive nonché tutte le pratiche giudiziali concernenti tanto le questioni contrattuali, in relazione al recesso e/o alla risoluzione dei contratti di concessione e di riparatore autorizzato, quanto quelle concernenti i casi di product liability.<br>Si è infine occupato dell’assistenza delle società finanziarie dei produttori di autoveicoli in relazione alle azioni nascenti dai fallimenti delle concessionarie, con particolare riferimento alle azioni revocatorie concernenti tanto la ripresa in possesso degli autoveicoli, tanto in relazione ai pagamenti.'
    },
    {
        id: 9,
        title: 'IP prorietà intellettuale',
        content: 'AGMLEX assiste la propria clientela nelle questioni attinenti la tutela della proprietà intellettuale ed industriale. Tanto nella fase giudiziale per la protezione di marchi e brevetti quanto nella fase di negoziazione e redazione di contratti di cessione, licenza, distribuzione, franchising, merchandising, sponsorizzazione, pubblicità e trasferimento di tecnologie.'
    },
    // {
    //     id: 10,
    //     title: 'REOCO (Real estate owned companies)',
    //     content: 'Decreto legge crescita (34/2019 confermato dalla legge di conversione (58/2019)<br>Agevolazioni per sostenere la gestione dei crediti deteriorati assistiti da ipoteche su immobili  o derivanti da contratti di leasing. In particolare, le Reoco, cioè le società veicolo ( “SPV”), costituite dalle società che effettuano operazioni di cartolarizzazione al fine di acquisire, gestire e valorizzare i beni immobili, a garanzia dei crediti oggetto di cartolarizzazione. I beni immobili e i diritti trasferiti alla Reoco e le somme realizzate dalla loro vendita costituiscono patrimonio separato,  di talché, non sono ammesse azioni da parte di creditori diversi dalla società di cartolarizzazione. Inoltre sono previste agevolazioni fiscali per incentivare le operazioni delle Reoco : il trasferimento dei beni immobili o dei diritti scontano l’imposta fissa di registro, ipotecaria e catastale (200 euro ciascuna). Sono soggetti a tale imposta agevolata anche gli eventuali accolli di debito, la concessione di garanzie alla società di cartolarizzazione o ad altro finanziatore in relazione all’operazione di cartolarizzazione e i relativi atti di surroga, postergazione, frazionamento, cancellazione e cessione di credito. Parimenti,  le imposte di registro, ipotecaria e catastale sono dovute in misura fissa (200 euro ciascuna) in caso di cessione da parte della Reoco dei detti beni a soggetti che svolgono attività d’impresa, a condizione che l’acquirente dichiari, nel relativo atto di cessione, che intende trasferire i beni in questione entro cinque anni dalla data di acquisto; qualora poi questa condizione non si verifichi, le imposte di registro, ipotecaria e catastale si rendono dovute dall’acquirente in misura ordinaria e si applica una sanzione amministrativa del 30% nonché gli interessi di mora. Qualora i beni in esame siano ceduti a persone fisiche, che possono avvalersi delle agevolazioni “prima casa” le imposte di registro, ipotecaria e catastale sono dovute in misura fissa (200 euro ciascuna). Inoltre, alle Reoco che subentrino in contratti di leasing si applica, con riferimento alla successiva gestione di detti contratti, la disciplina fiscale propria delle società di leasing con la conseguenza che le cessioni effettuate dalle Reoco e aventi a oggetto immobili rinvenienti da contratti di leasing risolti o cessati per fatto dell’utilizzatore si applicano le imposte di registro, ipotecaria e catastale in misura fissa (di euro 200 cadauna).'
    // }
]

export default competenze
