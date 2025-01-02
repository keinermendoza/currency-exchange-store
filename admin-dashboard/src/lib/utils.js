/* takes a string in ISO date and returns a string in format DD/MM/YYYY  */
export function transformDate(DateISO) {

    const dateObject = new Date(DateISO);
    
    const day = String(dateObject.getDate()).padStart(2, '0');
    const month = String(dateObject.getMonth() + 1).padStart(2, '0'); // getMonth() devuelve meses de 0 a 11
    const year = dateObject.getFullYear();
    
    return `${day}/${month}/${year}`;
}
