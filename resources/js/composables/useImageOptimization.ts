function useImageOptimization() {
    const decode = async (data: any) => {
        const blob = await data.blob();
        const url = URL.createObjectURL(blob);
        const name: string = (blob.type as string).split('/').join('.');

        return {
            file: new File(
                [blob],
                name,
                { type: blob.type }
            ),
            fileUrl: url
        }
    }

    const optimization = async (image: any)=> {
        const formData = new FormData();
        formData.append('file', image);

        const result = await fetch(`${import.meta.env.VITE_APP_URL}/api/proxy`, {
                method: 'POST',
                body: formData,
            });

        return decode(result);
    }

    return {
        optimization
    }
}

export default useImageOptimization;
