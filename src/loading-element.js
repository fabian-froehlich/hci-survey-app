(function () {
    Polymer({
        is: 'loading-element'
        , behaviors: [
            Polymer.NeonAnimatableBehavior
        ]
        , properties: {
            animationConfig: {
                value: function () {
                    return {
                        'entry': {
                            name: 'fade-in-animation'
                            , node: this
                            , timing: {
                                delay: 250
                            }
                        }
                        , 'exit': {
                            name: 'fade-out-animation'
                            , node: this
                            , timing: {
                                duration: 250
                            }
                        }
                    };
                }
            }
            , entryAnimation: {
                type: String
                , value: 'fade-in-animation'
            }
            , exitAnimation: {
                type: String
                , value: 'fade-out-animation'
            }
            , loading: {
                type: Boolean
                , value: true
            }
            , contentId: {
                type: String
                , value: 'placeHolder'
            }
            , _selected: {
                type: String
                , computed: '_computeSelected(loading)'
            }
        }
        , _computeSelected: function (loading) {
            return loading ? 'loader' : this.contentId;
        }
    });
})();