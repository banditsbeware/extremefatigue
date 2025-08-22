
for (let e of $('.randCSS')) $(e).css(randCSS());

for (let i of $('.husk')) setInterval(() => { edit(i); }, 50);

for (let i of $("[overr]"))
{
    let txt = $(i).attr("overr");
    $(i).css({
        "text-decoration":"underline",
        "cursor":"pointer"
    });
    $(i).attr({
        "onmouseover":`return overlib("${txt}", BELOW);`,
        "onmouseout":"nd();"
    });
}
