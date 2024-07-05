import type {CustomAction} from "@/store/types";
import type {TTokenState} from "@/store/Token/index";
import type {Commit} from "vuex";


export const getToken: CustomAction<TTokenState> = (
    {commit}: {commit: Commit}
): Promise<void> => {
    return new Promise((resolve, reject) => {
        
    });
}
