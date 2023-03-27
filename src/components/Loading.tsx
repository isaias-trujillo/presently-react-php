import "./../styles/loading.css"

export default function Loading() {
    return (
        <div className={'loading'}>
            <div className="lds-facebook">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    )
}