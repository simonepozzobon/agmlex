<template>
<div class="competenze">
    <a
        class="competenze-title"
        data-toggle="collapse"
        @click="this.collapse"
    >
        {{ title }}
    </a>
    <div
        class="competenze-content collapse"
        ref="content"
        v-html="content"
    >
    </div>
    <div class="competenze-footer">
        <a @click="this.collapse">
            <svg
                v-if="status"
                width="32"
                viewBox="0 0 200 108"
                version="1.1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
            >
                <g
                    id="arrow-up"
                    stroke="none"
                    stroke-width="1"
                    fill="none"
                    fill-rule="evenodd"
                >
                    <path
                        d="M0,100.493583 C0,99.703846 0.16452616,98.8812152 0.493583416,98.0256663 C0.822640671,97.1701175 1.31621915,96.4132971 1.97433366,95.7551826 L95.952616,1.7769003 C97.268845,0.592294176 98.8482962,0 100.691017,0 C102.533737,0 104.113189,0.592294176 105.429418,1.7769003 L198.025666,94.5705824 C199.341895,95.8868115 200,97.4662626 200,99.3089832 C200,101.151704 199.341895,102.731155 198.025666,104.047384 C196.709437,105.363613 195.129986,106.021718 193.287266,106.021718 C191.444545,106.021718 189.865094,105.363613 188.548865,104.047384 L100.691017,16.189536 L11.4511352,105.231984 C10.1349062,106.548213 8.55545508,107.206318 6.71273445,107.206318 C4.87001382,107.206318 3.29056269,106.548213 1.97433366,105.231984 C1.31621915,104.57387 0.822640671,103.849955 0.493583416,103.060217 C0.16452616,102.27048 0,101.414944 0,100.493583 Z"
                        id="arrow"
                        fill="#797F8B"
                    ></path>
                </g>
            </svg>
            <svg
                v-else
                width="32"
                viewBox="0 0 200 108"
                version="1.1"
                xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink"
            >
                <g
                    id="arrow-down"
                    stroke="none"
                    stroke-width="1"
                    fill="none"
                    fill-rule="evenodd"
                >
                    <path
                        d="M0,6.51530109 C0,5.72556367 0.16452616,4.90293287 0.493583416,4.04738401 C0.822640671,3.19183514 1.31621915,2.43501481 1.97433366,1.7769003 C3.29056269,0.592294176 4.87001382,0 6.71273445,0 C8.55545508,0 10.1349062,0.592294176 11.4511352,1.7769003 L100.691017,91.0167818 L188.548865,3.15893386 C189.865094,1.84270484 191.444545,1.1846002 193.287266,1.1846002 C195.129986,1.1846002 196.709437,1.84270484 198.025666,3.15893386 C199.341895,4.47516288 200,6.05461402 200,7.89733465 C200,9.74005528 199.341895,11.3195064 198.025666,12.6357354 L105.429418,105.231984 C104.113189,106.548213 102.533737,107.206318 100.691017,107.206318 C98.8482962,107.206318 97.268845,106.548213 95.952616,105.231984 L1.97433366,11.4511352 C1.31621915,10.7930207 0.822640671,10.0362004 0.493583416,9.18065153 C0.16452616,8.32510267 0,7.4366614 0,6.51530109 Z"
                        id="arrow"
                        fill="#797F8B"
                    ></path>
                </g>
            </svg>
        </a>
    </div>
</div>
</template>

<script>
export default {
    name: 'Competenze',
    props: {
        idx: {
            type: Number,
            default: 0,
        },
        title: {
            type: String,
            default: 'Titolo'
        },
        content: {
            type: String,
            default: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
        }
    },
    data: function () {
        return {
            status: false,
        }
    },
    methods: {
        collapse: function () {
            let content = this.$refs.content
            $(content).collapse('toggle')

            // events that switch between arrow down and arrow up
            $(content).on('shown.bs.collapse', () => this.status = true)
            $(content).on('hidden.bs.collapse', () => this.status = false)
        }
    }
}
</script>

<style lang="scss">
@import '~styles/functions';
@import '~styles/variables';
@import '~styles/mixins';

.competenze {
    @include make-col(12);
    @include media-breakpoint-up('sm') {
        @include make-col(12);
    }
    @include media-breakpoint-up('md') {
        @include make-col(4);
    };
    padding: 3%;

    .competenze-title {
        padding-bottom: $spacer;
        display: block;
        font-weight: bold;
        text-align: center;
        border-bottom: 1px solid $primary;
    }

    .competenze-content {
        padding-top: $spacer;
        padding-bottom: $spacer;
        color: $secondary;
        text-align-last: center;
        text-align: justify;
    }

    .competenze-footer {
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: $spacer;
        padding-bottom: $spacer;
    }
}
</style>
