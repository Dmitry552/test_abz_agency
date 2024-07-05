import type {InjectionKey} from 'vue';
import { createStore, Store, useStore as baseUseStore} from 'vuex';
import type {TRootState} from "@/store/types";

export const key: InjectionKey<Store<TRootState>> = Symbol()

export const store: Store<TRootState> = createStore<TRootState>({
    modules: {
        position: {}
    }
});

export function useStore (): Store<TRootState> {
    return baseUseStore(key)
}
