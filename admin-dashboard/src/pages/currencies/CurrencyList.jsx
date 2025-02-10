import { useNavigate, NavLink } from "react-router";
import { useCurrency } from "../../contexts/CurrencyContext";
import { CardAction, CardFooter, PrimaryButton } from "../../components/ui";
import { primaryButtonStyle } from "../../components/forms";

export function CurrencyList() {
    const navigate = useNavigate();
    const {currencies} = useCurrency();

    const imageCss = "size-36 bg-gray-500 mb-3 rounded-full shadow-lg";
    return (
        <section>

            <div className="mb-10 flex flex-col items-center justify-start sm:flex-row sm:justify-between gap-4">
                <h1 className='text-3xl font-medium'>Monedas</h1>
                <NavLink to={'registrar'} className={primaryButtonStyle}>
                    Registrar Moneda
                </NavLink>
            </div>
            <div className=' grid grid-cols-[repeat(auto-fit,minmax(16rem,1fr))] gap-4'>
            {currencies.length === 0 && <p className="max-w-md">Preciona el boton <b>Registrar Moneda</b> para registrar tu primera moneda</p>}

            {currencies?.map(currency => (
                <CardAction 
                    key={currency.id}
                    extraClass="items-center">
                    <p className='mb-3 text-xl font-medium text-gray-900 dark:text-white'>{currency.name}</p>
                    {currency.image 
                        ? <img className={imageCss + " size-12"} src={currency.image} /> 
                        : <div className={imageCss + " size-12"}></div>
                    }
                    <span className="text-2xl text-gray-500 dark:text-gray-400">{currency.symbol}</span>
                    <CardFooter>
                        <PrimaryButton handleClick={() => navigate("./" + currency.id)}>Editar</PrimaryButton>
                    </CardFooter>
                </CardAction>
            ))}
            </div>

        </section>

    );
}
