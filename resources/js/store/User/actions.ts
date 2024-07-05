import type {CustomAction} from "@/store/types";
import type {TUserState} from "@/store/User/index";
import type {Commit} from "vuex";
import type {TCreateUserData} from "@/store/User/types";

export const createUsers: CustomAction<TUserState> = (
    {commit}: {commit: Commit},
    data: TCreateUserData
): Promise<void> => {
    return new Promise((resolve, reject) => {

    });
};

export const getUsers: CustomAction<TUserState> = (
    {commit}: {commit: Commit}
): Promise<void> => {
    return new Promise((resolve, reject) => {

    });
};

export const getUser: CustomAction<TUserState> = (
    {commit}: {commit: Commit},
    data: number
): Promise<void> => {
    return new Promise((resolve, reject) => {

    });
};
