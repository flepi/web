const getParentNamesTotalLength = (child) => {
    const mother = getParentFor(child, 'mother').length;
    const father = getParentFor(child, 'father').length;
    console.log(mother + father);
    return mother + father;
};
getParentNamesTotalLength(Gena);
