import type {CustomAction} from "@/store/types";
import type {TUserState} from "@/store/User/index";
import type {Commit} from "vuex";
import type {IGetUser, IGetUsers, IPostCreateUsers, TGetUsersByPageData} from "@/store/User/types";
import {$http} from "@/utils/http";
import * as types from './mutationsUserTypes';

export const createUsers: CustomAction<TUserState> = (
    {getters}: {getters: any},
    data: FormData
): Promise<IPostCreateUsers> => {
    return new Promise((resolve, reject) => {
        const token = getters.getToken;
        if (!token) {
            reject();
        }

        $http.post<IPostCreateUsers>('/api/users', data, {
            headers: {
                'token': token
            }
        }).then(({data}) => {
            resolve(data);
        }).catch(({response}) => {
            const resData = response.data;
            resData.status = response.status;
            reject(resData);
        });
    });
};

export const getUsers: CustomAction<TUserState> = (
    {commit}: {commit: Commit}
): Promise<IGetUsers> => {
    return new Promise((resolve, reject) => {
        $http.get<IGetUsers>('/api/users').then(({data}) => {
            commit(types.GET_USERS, data.users);
            resolve(data);
        }).catch(({response: {data}}) => {
            reject(data);
        });
    });
};

export const getUser: CustomAction<TUserState> = (
    {commit}: {commit: Commit},
    data: number
): Promise<void> => {
    return new Promise((resolve, reject) => {
        $http.get<IGetUser>(`/api/users/${data}`).then(({data}) => {
            commit(types.GET_USER, data.user);
            resolve();
        }).catch(err => {
            reject()
        })
    });
};

export const getUsersByPage: CustomAction<TUserState> = (
    {commit}: {commit: Commit},
    requestData: TGetUsersByPageData
): Promise<IGetUsers> => {
    return new Promise((resolve, reject) => {
        $http.get<IGetUsers>(`/api/users?page=${requestData.page}&count=${requestData.count}`)
            .then(({data}) => {
                if (requestData.key === 'add') {
                    commit(types.ADD_USERS, data.users);
                } else {
                    commit(types.REWRITE_USERS, data.users);
                }
                resolve(data);
            }).catch(({response: {data}}) => {
                reject(data);
            });
    });
};
