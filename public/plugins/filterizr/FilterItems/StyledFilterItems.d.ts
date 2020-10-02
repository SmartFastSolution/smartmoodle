import StyledFilterizrElements from '../StyledFilterizrElements';
import FilterItem from '../FilterItem/FilterItem';
export default class StyledFilterItems extends StyledFilterizrElements {
    private _filterItems;
    constructor(elements: FilterItem[]);
<<<<<<< HEAD
    resetDisplay(): void;
=======
>>>>>>> 8f5c732cef116f66c323290d19c8e4eb8fd04116
    removeWidth(): void;
    updateWidth(): void;
    updateTransitionStyle(): void;
    disableTransitions(): void;
    enableTransitions(): Promise<void>;
    updateWidthWithTransitionsDisabled(): void;
}
