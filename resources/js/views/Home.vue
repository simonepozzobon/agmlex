<template>
<div
    ref="container"
    class="home"
>
    <div class="home__banner">
        <img
            src="/assets/banner3.jpg"
            alt="agmlex"
        />
    </div>
    <div class="home__description description">
        <h1 class="description__title">AgmLex</h1>
        <p>
            Società tra avvocati a responsabilità limitata è stata recentemente costituita cogliendo l’opportunità data dalla prima legge sulla concorrenza. Tale forma societaria costituisce un’innovazione volta a rispondere alle esigenze del mercato
            globale che percepisce l’attività legale alla stregua di fornitura di servizi. Lo studio tuttavia è erede di una tradizione professionale che ha origini antiche e che si è rinnovata nel corso degli anni attraverso la specializzazione
            nelle aree del diritto civile, societario e degli NPL.
        </p>
    </div>
    <div class="home__description description">
        <h2 class="description__title">Avvocati d'impresa</h2>
        <p>
            lo studio è specializzato nel diritto societario e nel settore del contenzioso civile e dell'arbitrato in materia di contratti ed obbligazioni. Presta servizi di consulenza in favore di PMI, in italiano ed in inglese. La complessità
            legislativa e regolamentare in ogni campo oggi impone alle imprese di valutare con attenzione potenziali rischi legali prima inesistenti e di adeguarsi a normative sempre più stringenti. In questo contesto, l’avvocato d'impresa ha il
            compito di prevenire l'insorgere di problemi (giudiziali e non), attraverso l’analisi dei rischi e delle criticità connessi ad ogni singola operazione. Lo stesso deve gestire e risolvere i problemi già conclamati e quindi non più
            evitabili, attraverso un’efficace attività di difesa degli interessi dell’impresa, in sede giudiziale e stragiudiziale.
        </p>
    </div>
    <div class="home__description description">
        <h2 class="description__title">NPL / UTP</h2>
        <p>
            ha costituito un team di avvocati ed esperti del settore dei crediti deteriorati «NPL» e dei crediti in sofferenza “UTP”, per lo svolgimento delle attività di due diligence, valutazione del sottostante immobiliare, gestione del
            contenzioso e delle attività di recupero stragiudiziali e di negoziazione per evitare l’inadempimento definitivo.
        </p>
    </div>
</div>
</template>

<script>
export default {
    name: 'Home',
    watch: {
        '$root.containerHeight': function (value) {
            // set te maximum height for the main container
            this.setContainerHeight(value)
        }
    },
    methods: {
        setContainerHeight: function (value) {
            console.log(value);
            this.$refs.container.style.minHeight = value + 'px'
        }
    },
    mounted: function () {
        this.setContainerHeight(this.$root.containerHeight)
        // this.$root.footerPosition = 'inherit'
    }
}
</script>

<style lang="scss">
@import '~styles/shared';
.home {
    display: flex;
    padding: $spacer * 2;
    flex-direction: column;
    align-items: center;

    &__description {
        margin-bottom: $spacer * 2 * 1.618;
    }

    &__banner {
        margin-bottom: $spacer * 1.618;

        img {
            width: 100%;
            max-width: 1024px;
        }
    }
}

.description {
    max-width: 1024px;

    &__title {
        margin-bottom: $spacer * 1.618;
    }

    p {
        line-height: 2;
    }
}
</style>
