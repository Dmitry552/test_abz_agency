import type {CustomAction} from "@/store/types";
import type {TPositionState} from "@/store/Position/index";
import type {Commit} from "vuex";

export const getPositions: CustomAction<TPositionState> = (
        {commit}: {commit: Commit}
    ): Promise<void> => {
        return new Promise((resolve, reject) => {

        });
};
