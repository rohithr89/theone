#include <stdio.h>

int main(void) {
	// your code goes here
	int i,j,temp;
	int a[10]={10,12,9,7,4,2,1,33,11,22};
	printf("before sorting\n");
	for(i=0;i<10;i++)
	printf("%d\t",a[i]);
	for(i=0;i<10;i++)
		for(j=i;j<10;j++)
		 if(a[i] > a[j]) {
		 	temp = a[i];
		 	a[i] = a[j];
		 	a[j] = temp;
		 }
	printf("\nAfter sorting\n");
	for(i=0;i<10;i++)
	printf("%d\t",a[i]);
	return 0;
}
