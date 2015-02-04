#include <stdio.h>

int main(void) {
	// your code goes here
	int a[5] =  {11,4,0,23,45};
	int i,j,min,temp;
	printf("before SELECTION SORT\n");
	for(i=0;i<5;i++)
	printf("%d\t",a[i]);
	for(i=0;i<5-1;i++) {
		min=i;
		for(j=i;j<5;j++) {
			if(a[j]<a[min])
				min=j;
		}
		temp=a[i];
		a[i]=a[min];
		a[min]=temp;
	}
	printf("\nAfter INSERTION SORT\n");
	for(i=0;i<5;i++)
	printf("%d\t",a[i]);
	return 0;
}
