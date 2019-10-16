<template>
<div
    ref="container"
    class="container-fluid"
>
    <div class="contatti">
        <div class="contatti__info">
            <h2>AgmLex <small>s.r.l. società tra avvocati</small></h2>
            <div class="contatti__detail">
                <h5>Contatti</h5>
                <p>
                    Telefono: <a href="tel:+390697859226">+39 06 97 85 92 26</a><br>
                    Mail: <a href="mailto:l.albanese@agmlex.com">l.albanese@agmlex.com</a>
                </p>
            </div>
            <div class="contatti__detail">
                <h5>Sede legale</h5>
                <p>
                    Piazza Antonio Mancini, 4<br>
                    00196, Roma (RM)<br>
                    P.IVA IT14866811004<br>
                </p>
            </div>
            <div class="contatti__detail">
                <h5>Uffici</h5>
                <p>
                    Via Giuseppe Palumbo, 12<br>
                    00195, Roma (RM)<br>
                    P.IVA IT14866811004<br>
                </p>
            </div>
        </div>
        <div class="contatti__map">
            <iframe
                width="600"
                height="500"
                id="gmap_canvas"
                class="contatti__map-iframe"
                src="https://maps.google.com/maps?q=Via%20Giuseppe%20Palumbo%2C%2012%20Roma&t=&z=17&ie=UTF8&iwloc=&output=embed"
                frameborder="0"
                scrolling="no"
                marginheight="0"
                marginwidth="0"
            ></iframe>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: 'Contatti',
    watch: {
        '$root.containerHeight': function (value) {
            // set te maximum height for the main container
            this.setContainerHeight(value)
        }
    },
    methods: {
        setContainerHeight: function (value) {
            this.$refs.container.style.minHeight = value + 'px'
        }
    },
    mounted: function () {
        this.setContainerHeight(this.$root.containerHeight)
    }
}
</script>

<style lang="scss" scoped>
@import '~styles/shared';

.contatti {
    margin-top: $spacer * 1.618;
    display: flex;
    flex-direction: column;
    justify-content: center;

    @include media-breakpoint-up('md') {
        flex-direction: row;
    };

    &__info {
        padding: $spacer * 2;

        h2 {
            margin-bottom: $spacer * 1.618;
        }

        h5 {
            font-weight: bold;
            color: $primary;
        }
    }

    &__detail {
        margin-bottom: $spacer * 1.618;
    }

    &__map {
        @include media-breakpoint-up('md') {
            flex: 1 1 40%;
            max-width: 40%;
        };

        iframe {
            width: 100%;
            max-width: 100%;
            min-height: 200px;
            max-height: 100%;
        }
    }
}
</style>
