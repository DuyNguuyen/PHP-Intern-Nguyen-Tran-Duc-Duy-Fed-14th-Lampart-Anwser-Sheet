async function copyContent(id) 
{
    let text = document.getElementById(id).value;
    try {
        await navigator.clipboard.writeText(text);
        console.log(text);
        /* Resolved - text copied to clipboard successfully */
    } catch (err) {
        console.error('Failed to copy: ', err);
        /* Rejected - text failed to copy to the clipboard */
    }
}